@extends('layouts.app')

@section('content')

	<div class = "container">
		
			<div class="row">
				
			    <div class="col-sm-9 col-md-9 col-ld-9 col-xl-9">

			    	<div class="panel panel-default">
			    		<div class="panel-heading"><h4>Formulario de Contacto</h4></div>
			    		
			    		<div class ="panel-body">
			    			<form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        		{{ csrf_field() }}

                        		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            		<label for="name" class="col-md-4 control-label">* Nombre</label>

                            		<div class="col-md-6">
                                		<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                		@if ($errors->has('name'))
                                    		<span class="help-block">
                                       			<strong>{{ $errors->first('name') }}</strong>
                                    		</span>
                                		@endif
                            		</div>
                        		</div>

                        
                        		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            		<label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            		<div class="col-md-6">
                                		<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                		@if ($errors->has('email'))
                                    		<span class="help-block">
                                        		<strong>{{ $errors->first('email') }}</strong>
                                    		</span>
                                		@endif
                            		</div>
                        		</div>

                        
                        		<div class="form-group">
                            		<label for="mensaje" class="col-md-4 control-label">Mensaje</label>

                            		<div class="col-md-6">
                                		<textarea id="mensaje" name="mensaje" rows="4" class="form-control">
                                	

                                		</textarea>  
                            		</div>
                        		</div>

                        		<div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            		<label class="col-md-4 control-label">Captcha</label>

                            		<div class="col-md-6 pull-center">
                               		<div class="g-recaptcha" data-sitekey="6Ld0fkwUAAAAAAsOc3fV49c1OwKfnmJW7zyq40mG"></div>

                                		@if ($errors->has('g-recaptcha-response'))
                                    		<span class="help-block">
                                        		<strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    		</span>
                                		@endif
                            		</div>
                        		</div>

                        		<div class="form-group">
                            		<div class="col-md-6 col-md-offset-4">
                                		<button type="submit" class="btn btn-primary">
                                    		Enviar
                                		</button>
                            		</div>
                        		</div>
                    		</form>

			    		</div>	
			    	</div>
			    </div>

			
			    			<div class="LI-profile-badge"  data-version="v1" data-size="medium" data-locale="es_ES" data-type="horizontal" data-theme="light" data-vanity="johnnyaracena">
			    				<a class="LI-simple-link" href='https://cl.linkedin.com/in/johnnyaracena?trk=profile-badge'>Johnny Aracena</a>
			    			</div>
			  

			</div>
	</div>

@endsection

@section('script')

	<script type="text/javascript" src="https://platform.linkedin.com/badges/js/profile.js" async defer></script>
@endsection