<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">					
					<span>
                    <center> <strong>DATOS DE EVALUACIÒN</strong></center><br>
					</span>
				</div>
			</div>

              {{ csrf_field() }}                
                    <div class="card-body">

                    <div class="row">
                    <div class="col-md-12">
                        <label for="exampleInputEmail1">Descripción</label>
                        <textarea class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" rows="10"  name="texto" placeholder="Escriba la evaluación..." disabled>{{$eva->texto}}</textarea>
                        </div>

                    </div>


                    
                            
                        <br>
        

        
                 
            




			
		</div>
	</div>
</div>