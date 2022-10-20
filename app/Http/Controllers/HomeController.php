<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos = VsVideo::where('status','=',1)->get();
        $videos = $this->cargarDT($vs_videos);
        return view('videos.index')->with('videos',$videos);

    }
    public function cargarDT($consulta)
    {
        $videos = [];

        foreach ($consulta as $key => $value){

            $ruta = "eliminar".$value['id'];
            $eliminar = route('delete-video', $value['id']);
            $actualizar =  route('videos.edit', $value['id']);

            $acciones = '
           <div class="btn-acciones">
               <div class="btn-circle">
                   <a href="'.$actualizar.'" role="button" class="btn btn-success" title="Actualizar">
                       <i class="far fa-edit"></i>
                   </a>
                    <a href="#'.$ruta.'" role="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#'.$ruta.'">
                       <i class="far fa-trash-alt"></i>
                   </a>

               </div>
           </div>

            <!-- Modal -->
       <div class="modal fade" id="'.$ruta.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">¿Seguro que deseas eliminar este video?</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                       <p class="text-primary">
                   <small>
                       '.$value['id'].', '.$value['title'].'                 </small>
                 </p>
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                 <a href="'.$eliminar.'" type="button" class="btn btn-danger">Eliminar</a>
                   </div>
               </div>
           </div>
       </div>

       ';

            $videos[$key] = array(
                $acciones,
                $value['id'],
                $value['title'],
                $value['description'],
                $value['image'],
                $value['video_path'],
                $value['name'],
                $value['email']

            );

        }

        return $videos;
    }

}
