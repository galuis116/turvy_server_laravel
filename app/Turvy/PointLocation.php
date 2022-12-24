<?php

namespace App\Turvy;

/**
 * The point-in-polygon algorithm allows you to check if a point is
 * inside a polygon or outside of it.
 *
 * @author      Payam Yasaie <payam@yasaie.ir>
 * @copyright   2019/09/10
 *
 * Class PointLocation
 */
class PointLocation
{

    /**
     * Check if the point sits exactly on one of the vertices?
     *
     * @var bool
     */
    protected $pointOnVertex = true;

    /**
     * @author      Payam Yasiae <payam@yasaie.ir>
     * @copyright   2019/09/10
     *
     * @param $point
     * @param $polygon
     * @param bool $pointOnVertex
     *
     * @return string
     */
    public function pointInPolygon($point, $polygon, $pointOnVertex = true)
    {
        $this->pointOnVertex = $pointOnVertex;

        // Transform string coordinates into arrays with x and y values
        $point = $this->pointStringToCoordinates($point);
        $polygon = $this->polygonStringToCoordinates($polygon);

        $vertices = array();
        foreach ($polygon as $vertex) {
            $vertices[] = $this->pointStringToCoordinates($vertex);
        }

        // Check if the point sits exactly on a vertex
        if ($this->pointOnVertex == true and $this->pointOnVertex($point, $vertices) == true) {
            return "vertex";
        }

        // Check if the point is inside the polygon or on the boundary
        $intersections = 0;
        $vertices_count = count($vertices);

        for ($i = 1; $i < $vertices_count; $i++) {
            $vertex1 = $vertices[$i - 1];
            $vertex2 = $vertices[$i];

            // Check if point is on an horizontal polygon boundary
            if ($vertex1['y'] == $vertex2['y']
                and $vertex1['y'] == $point['y']
                and $point['x'] > min($vertex1['x'], $vertex2['x'])
                and $point['x'] < max($vertex1['x'], $vertex2['x'])
            ) {
                return "boundary";
            }
            if ($point['y'] > min($vertex1['y'], $vertex2['y'])
                and $point['y'] <= max($vertex1['y'], $vertex2['y'])
                and $point['x'] <= max($vertex1['x'], $vertex2['x'])
                and $vertex1['y'] != $vertex2['y']
            ) {
                $xinters = ($point['y'] - $vertex1['y']) * ($vertex2['x'] - $vertex1['x']) / ($vertex2['y'] - $vertex1['y']) + $vertex1['x'];

                // Check if point is on the polygon boundary (other than horizontal)
                if ($xinters == $point['x']) {
                    return "boundary";
                }
                if ($vertex1['x'] == $vertex2['x'] || $point['x'] <= $xinters) {
                    $intersections++;
                }
            }
        }

        // If the number of edges we passed through is odd, then it's in the polygon.
        if ($intersections % 2 != 0) {
            return "inside";
        } else {
            return "outside";
        }
    }

    /**
     * @author      Payam Yasiae <payam@yasaie.ir>
     * @copyright   2019/09/10
     *
     * @param $point
     * @param $vertices
     *
     * @return bool
     */
    public function pointOnVertex($point, $vertices)
    {
        foreach ($vertices as $vertex) {
            if ($point == $vertex) {
                return true;
            }
        }

    }

    /**
     * @author      Payam Yasiae <payam@yasaie.ir>
     * @copyright   2019/09/10
     *
     * @param $pointString
     *
     * @return array
     */
    protected function pointStringToCoordinates($pointString)
    {
        $coordinates = explode(",", $pointString);
        return array("x" => $coordinates[0], "y" => $coordinates[1]);
    }

    /**
     * @author      Payam Yasiae <payam@yasaie.ir>
     * @copyright   2019/09/10
     *
     * @param $string
     *
     * @return array
     */
    protected function polygonStringToCoordinates($string)
    {
        return is_string($string) ? explode('|', $string) : $string;
    }

}