<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentState extends Model
{
    public function state()
    {
        return $this->hasOne(State::class, 'id', 'state_id');
    }

    public $appends = ['documentNameList'];

    public function getDocumentNameListAttribute(){
        $result = '';
        if($this->document_ids != null){
            $docIds = explode(',', $this->document_ids);
            foreach($docIds as $docId){
                $document = Document::find($docId);
                if($document){
                    $result .= $document->name . ', ';
                }
          }
          return rtrim($result, ", ");
        }
        return $result;
    }
}
