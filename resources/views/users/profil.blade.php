@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('/css/profil.css') }}">

@section('content')
      <div class="col-md-9">
         <div class="row">
            <div class="col-md-12">
               <div class="logo"><h2>Checklist Médico</h2></div>
            </div>
         </div>
         <div class="row">   
            <div class="col-md-12">
               <table class="table table-sm">
                  <tbody>
                     <tr>
                        <td class="w-25 text-center" style="border-right:1px #41719C solid;border-top:5px #41719C solid;">Nome</td>
                        <td class="w-50" style="background-color:#D6E6F4;border-top:5px #41719C solid;border-right:1px #41719C solid;">
                           <input type="text" name="paciente" id="paciente" class="w-100">
                        </td>
                        <td class="text-center" rowspan="5" style="border-top:0">
                           <div class="mb-2" style="height:165px;width:172px;margin:0 auto;" id="foto">
                              <img src="http://via.placeholder.com/135x180" style="width:135px;height:185px;border:#41719C 2px solid;" id="foto_preview" class="img-thumbnail" alt="Foto Paciente">
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td style="width:200px;border-right:1px #41719C solid;" class="text-center" >Prontuário</td>
                        <td style="border-right:1px #41719C solid;">
                           <input type="text" name="prontuario" id="prontuario" class="w-100 element-white">
                        </td>
                     </tr>
                     <tr>
                        <td style="width:200px;border-right:1px #41719C solid;" class="text-center" >Diagnóstico</td>
                        <td style="background-color:#D6E6F4;border-right:1px #41719C solid;">
                           <input type="text" name="diagnostico" id="diagnostico" class="w-100">
                        </td>
                     </tr>
                     <tr>
                        <td style="width:200px;border-right:1px #41719C solid;" class="text-center" >Médico Responsável</td>
                        <td style="border-right:1px #41719C solid;">
                           <div class="select-wrapper">
                              <select style="border:0;" class="w-100 element-white">
                                 <option></option>
                                 <option>Dr. Carlos Mayrink de Souza</option>
                                 <option>Dr. Leonel Silva Andrade Couto</option>
                                 <option>Dr. Manoel Dias Salgado</option>                                 
                              </select>                           
                           </div>                           
                        </td>
                     </tr>
                     <tr>
                        <td style="width:200px;border-right:1px #41719C solid;" class="text-center" >Físico Responsável</td>
                        <td style="background-color:#D6E6F4;border-right:1px #41719C solid;">
                           <div class="select-wrapper">
                              <select style="border:0;" class="w-100">
                                 <option></option>
                                 <option>Carlos Vernet Sanches</option>
                                 <option>Cláudia Maria Luciano</option>
                              </select>                           
                           </div>
                        </td>
                     </tr>
                  </tbody>
               </table>
               <label class="custom-file hidden-print" style="display:none;">
                  <input type="file" id="btnImagemPaciente" style="width: 160px;" class="form-control form-control-sm">               
                  <span class="custom-file-control"></span>
               </label>                  
            </div>
         </div>
         <div class="row">
            <div class="col-md-12 text-white text-center d-block titulo">CHECKLIST – PRIMEIRA SEÇÃO NO APARELHO</div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <div class="form-check">
                  <label class="form-check-label">
                     <input class="form-check-input" type="checkbox" value="">
                     Identificação do Paciente  
                  </label>
               </div>
               <div class="form-check">
                  <label class="form-check-label">
                     <input class="form-check-input" type="checkbox" value="">
                     Localização Anatômica
                  </label>
               </div>
               <div class="form-check">
                  <label class="form-check-label">
                     <input class="form-check-input" type="checkbox" value="">
                     Curva e Dose de Prescrição
                  </label>
               </div>
               <div class="form-check">
                  <label class="form-check-label">
                     <input class="form-check-input" type="checkbox" value="">
                     Número de Frações
                  </label>
               </div>
               <div class="form-check">
                  <label class="form-check-label">
                     <input class="form-check-input" type="checkbox" value="">
                     Parâmetros de Campo (mesa, gantry, colimador, tempo, UM)
                  </label>
               </div>
               <div class="form-check">
                  <label class="form-check-label">
                     <input class="form-check-input" type="checkbox" value="">
                     Preenchimento de Ficha Técnica
                  </label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <textarea style="width: 320px;height: 172px;">Observações: </textarea>
               </div>                     
            </div>
         </div>
         <div class="row">
            <div class="col-md-12 text-white text-center d-block titulo">FÍSICO, MÉDICO E TÉCNICO PRESENTE 1º DIA</div>
         </div>              
         <div class="row">
            <div class="col-4 text-center">
               <p>_______________________________________</p>
               <p>Físico</p>
            </div>
            <div class="col-4 text-center">
               <p>_______________________________________</p>
               <p>Médico</p>
            </div>
            <div class="col-4 text-center">
               <p>_______________________________________</p>
               <p>Técnico</p>
            </div>
         </div> 
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <textarea style="width:100%;height: 172px;border:2px #41719C solid;">Observações: </textarea>
               </div>                     
            </div>                  
         </div>
      </div>
   </div>
</div>
   <script type="text/javascript">
      $("document").ready(function(){
        $("#foto").click(function(){
           $("#btnImagemPaciente").trigger('click');
        })
      })   
      window.addEventListener('load', function() {
         document.querySelector('input[type="file"]').addEventListener('change', function() {
            if (this.files && this.files[0]) {
               var img = document.getElementById('foto_preview');  // $('img')[0]
               img.src = URL.createObjectURL(this.files[0]); // set src to file url
               img.onload = imageIsLoaded; // optional onload event listener
            }
         });
      })
      $("#foto").click(function(){
           $("#btnImagemPaciente").trigger('click');
        })
        
        window.addEventListener('load', function() {
         document.querySelector('input[type="file"]').addEventListener('change', function() {
            if (this.files && this.files[0]) {
               var img = document.getElementById('foto_preview');  // $('img')[0]
               img.src = URL.createObjectURL(this.files[0]); // set src to file url
               img.onload = imageIsLoaded; // optional onload event listener
            }
         });
      })
   </script>
@stop