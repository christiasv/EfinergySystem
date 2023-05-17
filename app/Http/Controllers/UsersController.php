<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersFormRequest;
use App\Models\Areas;
use App\Models\Cargos;
use App\Models\Empresas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use function Webmozart\Assert\Tests\StaticAnalysis\string;

class UsersController extends Controller
{
    public function index(Request $request){
        if ($request) {
            $query=trim($request->get('searchText'));
            $user = DB::table('users')
                ->join('empresas', 'empresas.ID', '=', 'users.ID_Empresa')
                ->join('areas', 'areas.ID', '=', 'users.ID_Area')
                ->join('cargos', 'cargos.ID', '=', 'users.ID_Cargo')
                ->select('empresas.Nombre as en', 'areas.Nombre as an', 'cargos.Nombre as cn', 'users.Foto', 'users.name', 'users.Mail_personal', 'users.email', 'users.created_at')
                ->where('users.name', 'LIKE', '%' . $query . '%')
                ->where('users.ID', '!=', 1)
                ->orderBy('users.ID', 'desc')
                ->paginate(9);

            return view('usuarios.index',["usuarios"=>$user,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $empresas = Empresas::all();
        $areas = Areas::all();
        $cargos = Cargos::all();

        return view("usuarios.create", compact('empresas', 'areas', 'cargos'));
    }

    public function store(UsersFormRequest $request){
        $user=new User;
        $user->ID_Empresa = $request->get('ID_Empresa');
        $user->ID_Area = $request->get('ID_Area');
        $user->ID_Cargo = $request->get('ID_Cargo');
        $user->name = $request->get('name');
        $user->Genero = $request->get('Genero');
        $user->Tipo_doc = $request->get('Tipo_doc');
        $user->Doc_ident = $request->get('Doc_ident');
        $user->Fecha_nac = $request->get('Fecha_nac');
        $user->Direccion = $request->get('Direccion');
        $user->Telefono = $request->get('Telefono');
        $user->Mail_personal =$request->get('Mail_personal');
        if ($request->hasFile('Foto')) {
            $file=$request->file('Foto');
            $file->move(public_path().'/img/usuarios/',$file->getClientOriginalName());
            $user->Foto=$file->getClientOriginalName();
//            // Obtener la ruta de la imagen almacenada en 'slider'
//            $userPath = public_path().'/img/usuario/' . $file->getClientOriginalName();
//
//            // Copiar la imagen a la carpeta pública del proyecto EfinergyWeb
//            $destinationPath = base_path('../EfinergyWeb/public/img/usuario/' . $file->getClientOriginalName());
//            File::copy($userPath, $destinationPath);
        }
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->save();
        return Redirect::to('/usuarios');
    }

    public function show($id){
        return view("usuarios.show",["usuarios"=>User::findOrFail($id)]);
    }

    public function edit($id){
        return view("usuarios.edit",["usuarios"=>User::findOrFail($id)]);
    }

    public function update(UsersFormRequest $request, $id){
        $user=User::findOrFail($id);
        $user->ID_Empresa = $request->get('ID_Empresa');
        $user->ID_Area = $request->get('ID_Area');
        $user->ID_Cargo = $request->get('ID_Cargo');
        $user->name = $request->get('name');
        $user->Genero = $request->get('Genero');
        $user->Tipo_doc = $request->get('Tipo_doc');
        $user->Doc_ident = $request->get('Doc_ident');
        $user->Fecha_nac = $request->get('Fecha_nac');
        $user->Direccion = $request->get('Direccion');
        $user->Telefono = $request->get('Telefono');
        $user->Mail_personal =$request->get('Mail_personal');
        if ($request->hasFile('Foto')) {
            $file=$request->file('Foto');
            $file->move(public_path().'/img/usuarios/',$file->getClientOriginalName());
            $user->Foto=$file->getClientOriginalName();
//            // Obtener la ruta de la imagen almacenada en 'slider'
//            $userPath = public_path().'/img/usuario/' . $file->getClientOriginalName();
//
//            // Copiar la imagen a la carpeta pública del proyecto EfinergyWeb
//            $destinationPath = base_path('../EfinergyWeb/public/img/usuario/' . $file->getClientOriginalName());
//            File::copy($userPath, $destinationPath);
        }
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->Estado =$request->get('Estado');
        $user->update();
        return Redirect::to('/usuarios');
    }

    public function destroy($id){
        // Obtener el usuario que se está eliminando
        $user = User::findOrFail($id);

        // Eliminar la imagen asociada al usuario si existe
        if ($user->fotografia) {
            $filePath = public_path().'/img/usuarios/'.$user->fotografia;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Eliminar el usuario de la base de datos
        DB::table('users')->where('id','=',$id)->delete();

        // Redirigir al usuario a la vista index de usuarios
        return Redirect::to('/usuarios');
    }
}
