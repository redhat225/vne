<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;

// Home Controller For Managing Home Tab
class ZineController extends AppController
{

    public function initialize(){

    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
    }

    public function beforeRender(Event $event){
        parent::beforeFilter($event);

        $this->viewBuilder()->layout('blank');
    }

    public function read(){
        $params = $this->request->params;
        $booklet_path = $params['type_booklet'].'/'.$params['booklet_path'].'.pdf';

        $this->set(compact('booklet_path'));
        $this->set('_serialize',['booklet_path']);
    }

    public function download(){
        $response  =  $this->response->withFile("emag".DS."meet_greet.pdf",['download'=>true,'name'=>'emag']);
        return $response;
    }


}