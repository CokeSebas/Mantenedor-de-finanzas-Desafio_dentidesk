<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link rel="stylesheet" type="text/css" href="../css/styles.css" media="screen" />
        <script type="text/javascript" src="../js/vue.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

        
        <script src="https://unpkg.com/vuejs-datepicker"></script>

        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    

        <title>Ingresar Transacci&oacute;n</title>

    </head>

    <body>
        <div id="app_transaccion">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <div class="dropdown">
                            <button class="mainmenubtn">Men&uacute; Principal</button>
                            <div class="dropdown-child">
                                <a href="ingresarTransaccion.php">Ingresar Transaccion</a>
                                <a href="verGanancias.php">Ver Ganancias por Mes</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <div class="col-12">
                                <h1>
                                    Ingresar Transacci&oacute;n
                                </h1>
                                <br>

                                <div class="form-group">
                                    Seleccione tipo Transacci&oacute;n
                                </div>
                                <div class="form-group">
                                    <select class="form-control" v-model="tipo_trans" id="exampleFormControlSelect1" @change="tipoTransaccion()">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Ingreso</option>
                                        <option value="2">Egreso</option>
                                    </select>
                                </div>
                                <br>
    
                                <div class="form-group" v-if="ver_ingreso == true">
                                    Monto Ingreso
                                </div>
                                <div class="form-group" v-if="ver_ingreso == true">
                                    <input type="text" class="form-control" placeholder="Monto" v-model="monto_ingreso" @keypress="isNumber($event)">
                                </div>
                                <br v-if="ver_ingreso == true">

                                <div class="form-group" v-if="ver_egreso == true">
                                    Monto Egreso
                                </div>
                                <div class="form-group" v-if="ver_egreso == true">
                                    <input type="text" class="form-control" placeholder="Monto" v-model="monto_egreso" @keypress="isNumber($event)">
                                </div>
                                <br v-if="ver_egreso == true">
    
                                <div class="form-group">
                                    Fecha Transacci&oacute;n
                                </div>
                                <div class="form-group">
                                    <vuejs-datepicker
                                        format="dd/MM/yyyy"
                                        v-model="fecha_trans"
                                        v-bind:calendar-button="true"
                                        v-bind:monday-first="true"
                                        v-bind:bootstrap-styling="true"
                                        calendar-button-icon="fa fa-calendar" >
                                    </vuejs-datepicker>

                                </div>
                                <br>
                                <div class="form-group">
                                    <input type="button" class="btn btn-primary" value="Guardar" @click="guardarTransaccion()">
                                </div>
                            </div>
                        </div>
        
                    </div>
                </div>
            </div>



            <div class="modal" tabindex="-1" role="dialog" id="text_modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title">{{this.titulo_modal}}</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{this.msj_modal}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
                    </div>
                    </div>
                </div>
            </div>

        </div>
    </body>

</html>

<script type="text/javascript">
    $( function() {
        $( "#datepicker" ).datepicker();
    } );




    var app_transaccion = new Vue({
        delimiters: ['{{', '}}'],
		el: '#app_transaccion',

        components: {
            vuejsDatepicker,
        },

        data: {
            monto_ingreso: 0,
            monto_egreso: 0,
            tipo_trans: 0,
            total_ganancias: 0,
            fecha_trans: '',
            fecha_ganancias: '',
            ver_fecha_gan: '',
            ver_ingreso: false,
            ver_egreso: false,

            ver_ganancias: false,

            status_response: false,

            titulo_modal: 'Ingresar Transacción',
            msj_modal: 'Transacción realizada correctamente',

            url_guardar: 'http://localhost/Mantenedor-de-finanzas-Desafio_dentidesk/index.php/movimientos/guardar',
            url_ganancia: 'http://localhost/Mantenedor-de-finanzas-Desafio_dentidesk/index.php/movimientos/ganancias',

            
        },

        methods: {

            formatDate: function (date,tipo) {
                var d = new Date(date),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;

                var fecha = '';
                if(tipo == 'guardar'){
                    fecha = [year, month, day].join('-');
                }else{
                    fecha = [year, month].join('-');
                }


                return fecha
            },

            isNumber: function (evt) {
                evt = (evt) ? evt : window.event;

                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                    evt.preventDefault();;
                } else {
                    return true;
                }

            },

            tipoTransaccion: function(){
                if(this.tipo_trans == 1){
                    this.ver_ingreso = true;
                    this.ver_egreso = false;
                    this.monto_egreso = 0;
                }else{
                    this.monto_ingreso = 0;
                    this.ver_egreso = true;
                    this.ver_ingreso = false;
                }
            },

            limpiar_formulario: function(){
                this.monto_ingreso = 0;
                this.monto_egreso = 0;
                this.tipo_trans = 0;
                this.fecha_trans = '';
                this.ver_ingreso = false;
                this.ver_egreso = false;
            },


            async guardarTransaccion () {

                var fecha = this.formatDate(this.fecha_trans,'guardar');

                const datos = {
                    monto_ingreso: this.monto_ingreso,
                    monto_egreso: this.monto_egreso,
                    fecha_transaccion: fecha,
                };

                const response = await axios.post(this.url_guardar,datos);
                 
                if(response.data.status == true){
                        
                    $("#text_modal").modal('show');
                    this.limpiar_formulario();
                }
            },


            async verGanancias(){
                var fecha = this.formatDate(this.fecha_ganancias,'ganancia');

                const datos = {
                    fecha_transaccion: fecha,
                };
                

                const response = await axios.post(this.url_ganancia,datos);

                this.status_response = response.data.status;

                if(this.status_response == true){
                    this.total_ganancias = response.data.arrGanancias; 
                    this.ver_fecha_gan = response.data.fecha;

                    this.ver_ganancias = true;
                }

            },
        
        },

    });

</script>