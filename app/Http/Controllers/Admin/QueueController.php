<?php

namespace App\Http\Controllers\Admin;

use App\Airport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Queue;
use App\Turvy\PointLocation;
use Carbon\Carbon;

class QueueController extends Controller
{
    public function __construct()
    {
        $this->middleware('ProviderApiVal')
            ->except(['index', 'removeQueue']);
        $this->middleware('auth:admin')
            ->only(['index', 'removeQueue']);
        $this->middleware('permission:queue-list|queue-delete', ['only' => ['index']]);
        $this->middleware('permission:queue-delete', ['only' => ['removeQueue']]);
    }

    /**
     * @copyright   2019/09/05
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        $queues = $this->getQueue($request);

        return view('admin.queue.index')
            ->with('queues', $queues)
            ->with('page', 'queue');
    }

    /**
     * @copyright   2019/09/05
     *
     * @param Request $request
     *
     * @return ProviderQueue[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getQueue(Request $request)
    {
        $airport_id = $this->findAirport($request->latitude, $request->longitude);

        $LastSyncTime = Carbon::now()->subMinutes(2);
        $Position = 1;

        $update_queue = Queue::where('last_sync', '<', $LastSyncTime);

        if ($airport_id) {
            $update_queue->where('airport_id', $airport_id);
        }

        try {
            //remove the drivers that closed their app
            $update_queue->update([
                'is_alive' => 0
            ]);
        } catch (\Exception $e) {
            $Msg['success'] = false;
            $Msg['error'] = $e->getMessage();
            $Msg['error_code'] = 101;
            $Msg['error_messages'] = 'Operation failed. Please try again (Error on section 1)';


            return $Msg;
        }

        //Get the list of drivers that exists in the queue
        $provider_queue = Queue::where('is_alive', 1)
            ->orderBy('priority_time', 'asc')
            ->get();

        foreach ($provider_queue as $queue) {
            //Define the position of the driver in the queue
            $queue->position = $Position++;

            try {
                $queue->save();
            } catch (\Exception $e) {
                
              $Msg['success'] = false;
              $Msg['error'] = $e->getMessage();
              $Msg['error_code'] = 101;
              $Msg['error_messages'] = 'Operation failed. Please try again (Error on section 2)';
              
                return $Msg;
            }
        }

        return $provider_queue;
    }

    /**
     * @copyright   2019/09/05
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function removeQueue(Request $request)
    {
        $this->validate($request, [
            'id' => ['required', 'exists:providers,id'],
            'latitude' => ['required'],
            'longitude' => ['required']
        ]);

        $airport_id = $this->findAirport($request->latitude, $request->longitude);

        $LastSyncTime = Carbon::now()->subMinutes(2);
        $Position = 1;

        try {
            //remove the drivers that closed their app
            Queue::where('is_alive', 1)
                ->where('airport_id', $airport_id)
                ->where(function ($query) use ($request, $LastSyncTime) {
                    $query->where('provider_id', $request->id)
                        ->orWhere('last_sync', '<', $LastSyncTime);
                })->update([
                    'is_alive' => 0
                ]);
        } catch (\Exception $e) {

          	$Msg['success'] = false;
            $Msg['error'] = $e->getMessage();
            $Msg['error_code'] = 101;
            $Msg['error_messages'] = 'Operation failed. Please try again (Error on section 1)';

            return $Msg;
        }

        //Get the list of drivers that exists in the queue
        $provider_queue = Queue::select()
            ->where('is_alive', 1)
            ->get();

        foreach ($provider_queue as $queue) {
            //Define the position of the driver in the queue
            $queue->position = $Position++;

            try {
                $queue->save();
            } catch (\Exception $e) {
                $Msg['success'] = false;
                $Msg['error'] = $e->getMessage();
                $Msg['error_code'] = 101;
                $Msg['error_messages'] = 'Operation failed. Please try again (Error on section 2)';
              
                return $Msg;
            }
        }

		$Msg['success'] = true;
        $Msg['error'] = '';
        $Msg['error_code'] = 0;
        $Msg['error_messages'] = 'The driver removed from the queue successfully!';

        if ($request->redirect) {
            return back();
        } else {
            return $Msg;
        }
    }

    /**
     * @author      Payam Yasiae <payam@yasaie.ir>
     * @copyright   2019/09/12
     *
     * @param $latitude
     * @param $longitude
     *
     * @return int|null
     */
    public function findAirport($latitude, $longitude)
    {
        $airport_id = null;

        if ($latitude and $longitude) {
            $airports = Airport::all();
            $point_location = new PointLocation();

            $point = "$latitude,$longitude";

            foreach ($airports as $airport) {
                if ($airport->coordinates and $point_location->pointInPolygon($point, $airport->coordinates) != 'outside') {
                    $airport_id = (int)$airport->id;
                    break;
                }
            }
        }

        return $airport_id;
    }
}
