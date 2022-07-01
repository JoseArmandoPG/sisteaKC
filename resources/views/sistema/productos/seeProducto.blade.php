<!-- Modal -->
<div class="modal bd-example-modal-lg" id="seeProducto{{$pr->idPro}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Datos de la Compra</h5><br>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" styl="width:20px">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <img src ="{{asset('archivos/'.$pr->foto)}}" class="col-md-12 col-sm-12" style="max-width:275px; width:100%;  margin: auto; display: block;">
                    <!-- <div class="row">
                        <div class="col-md-12">
                            <table class="table" width="100%">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <td style="text-align:left;">{{$pr->codigo}}</td>

                                        <th>Producto</th>
                                        <td style="text-align:left;">{{$pr->producto}}</td>
                                    </tr>
                                    <tr>
                                        <th>Modelo</th>
                                        <td style="text-align:left;">{{$pr->modelo}}</td>

                                        <th>Unidad</th>
                                        <td style="text-align:left;">{{$pr->unidad}}</td>
                                    <tr>
                                        <th>Stock</th>
                                        <td style="text-align:left;">{{$pr->stock}}</td>

                                        <th>Precio</th>
                                        <td style="text-align:left;">$ {{$english_format_number=number_format($pr->precio)}}</td>
                                    </tr>
                                    <tr>
                                        <th>Importe</th>
                                        <td style="text-align:left;">$ {{$english_format_number=number_format($pr->importe)}}</td>

                                        <th>Iva</th>
                                        <td style="text-align:left;">$ {{$english_format_number=number_format($pr->iva)}}</td>
                                    </tr>
                                    <tr>
                                        <th>Precio + Iva</th>
                                        <td style="text-align:left;">$ {{$english_format_number=number_format($pr->total)}}</td>

                                        <th>Precio Alternativo</th>
                                        <td style="text-align:left;">$ {{$english_format_number=number_format($pr->precioAlterno)}}</td>
                                    </tr>
                                    <tr>
                                        <th>Caducidad</th>
                                        @php
                                            $campo3 = $pr->fCaducidad;
                                            $date3 = date_create($campo3);
                                            $fecha3 = date_format($date3, 'd-m-y');
                                        @endphp
                                        <td style="text-align:left;">{{$fecha3}}</td>                                        

                                        <th>Ultimo Movimiento</th>
                                        @php
                                            $campo4 = $pr->updated_at;
                                            $date4 = date_create($campo4);
                                            $fecha4 = date_format($date4, 'd-m-y');
                                        @endphp
                                        <td style="text-align:left;">{{$fecha4}}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td style="text-align:left;">{{$pr->status}}</td>

                                        <th>Color</th>
                                        <td style="text-align:left;">{{$pr->color}}</td>
                                    </tr>
                                    <tr>
                                        <th>Medida</th>
                                        <td style="text-align:left;">{{$pr->medida}}</td>

                                        <th>Genero</th>
                                        <td style="text-align:left;">{{$pr->genero}}</td>
                                    </tr>
                                    <tr>
                                        <th>Talla</th>
                                        <td style="text-align:left;">{{$pr->talla}}</td>

                                        <th>Linea</th>
                                        <td style="text-align:left;">{{$pr->linea}}</td>
                                    </tr>
                                    <tr>
                                        <th>Categoria</th>
                                        <td style="text-align:left;">{{$pr->categoria}}</td>

                                        <th>Ubicacion</th>
                                        <td style="text-align:left;">{{$pr->ubicacion}}</td>
                                    </tr>
                                    <tr>
                                        <th>Plataforma</th>
                                        <td style="text-align:left;">{{$pr->plataforma}}</td>

                                        <th>Marca</th>
                                        <td style="text-align:left;">{{$pr->marca}}</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-md-4"  style="text-align: left;">
                            <p>
                                <b class="b_title">Codigo: </b>
                                <b class="b_subtitle">{{$pr->codigo}}</b>
                            </p>
                        </div>
                        <div class="col-md-4" style="text-align: center;">
                            <p>
                                <b class="b_title">Producto: </b>
                                <b class="b_subtitle">{{$pr->producto}}</b>
                            </p>
                        </div>
                        <div class="col-md-4" style="text-align: right;">
                            <p>
                                <b class="b_title">Modelo: </b>
                                <b class="b_subtitle">{{$pr->modelo}}</b>
                            </p>
                        </div>
                    </div>
                    <p></p><hr style="width:430px; margin: 0;"><p></p>
                    <div class="row">
                        <div class="col-md-4" style="text-align: left;">
                            <p>
                                <b class="b_title">Unidad: </b>
                                <b class="b_subtitle">{{$pr->unidad}}</b>
                            </p>
                        </div>
                        <div class="col-md-4" style="text-align: center;">
                            <p>
                                <b class="b_title">Stock: </b>
                                <b class="b_subtitle">{{$pr->stock}}</b>
                            </p>
                        </div>
                        <div class="col-md-4" style="text-align: right;">
                            <p>
                                <b class="b_title">Precio: </b>
                                <b class="b_subtitle">$ {{$english_format_number=number_format($pr->precio)}}</b>
                            </p>
                        </div>
                    </div>
                    <p></p><hr style="width:430px; margin: 0;"><p></p>
                    <div class="row">
                        <div class="col-md-4" style="text-align: left;">
                            <p>
                                <b class="b_title">Importe: </b>
                                <b class="b_subtitle">$ {{$english_format_number=number_format($pr->importe)}}</b>
                            </p>
                        </div>
                        <div class="col-md-4" style="text-align: center;">
                            <p>
                                <b class="b_title">Iva: </b>
                                <b class="b_subtitle">$ {{$english_format_number=number_format($pr->iva)}}</b>
                            </p>
                        </div>
                        <div class="col-md-4" style="text-align: right;">
                            <p>
                                <b class="b_title">Total: </b>
                                <b class="b_subtitle">$ {{$english_format_number=number_format($pr->total)}}</b>
                            </p>
                        </div>
                    </div>
                    <p></p><hr style="width:700px; margin: 0;"><p></p>
                    <div class="row">
                        <div class="col-md-4" style="text-align: left;">
                            <p>
                                <b class="b_title">Precio Alterno: </b>
                                <b class="b_subtitle">$ {{$english_format_number=number_format($pr->precioAlterno)}}</b>
                            </p>
                        </div>
                        <div class="col-md-4" style="text-align: center;">
                            <p>
                                <b class="b_title">Caducidad: </b>
                                @php
                                    $campo3 = $pr->fCaducidad;
                                    $date3 = date_create($campo3);
                                    $fecha3 = date_format($date3, 'd-m-y');
                                @endphp
                                <b class="b_subtitle">{{$fecha3}}</b>
                            </p>
                        </div>
                        <div class="col-md-4" style="text-align: right;">
                            <p>
                                <b class="b_title">Ultimo Movimiento: </b>
                                @php
                                    $campo4 = $pr->updated_at;
                                    $date4 = date_create($campo4);
                                    $fecha4 = date_format($date4, 'd-m-y');
                                @endphp
                                <b class="b_subtitle">{{$fecha4}}</b>
                            </p>
                        </div>
                    </div>
                    <p></p><hr style="width:700px; margin: 0;"><p></p>
                    <div class="row">
                        <div class="col-md-4" style="text-align: left;">
                            <p>
                                <b class="b_title">Status: </b>
                                <b class="b_subtitle">{{$pr->status}}</b>
                            </p>
                        </div>
                        <div class="col-md-4" style="text-align: center;">
                            <p>
                                <b class="b_title">Color: </b>
                                <b class="b_subtitle">{{$pr->color}}</b>
                            </p>
                        </div>
                        <div class="col-md-4" style="text-align: right;">
                            <p>
                                <b class="b_title">Medida: </b>
                                <b class="b_subtitle">{{$pr->medida}}</b>
                            </p>
                        </div>
                    </div>
                    <p></p><hr style="width:700px; margin: 0;"><p></p>
                    <div class="row">
                        <div class="col-md-4" style="text-align: left;">
                            <p>
                                <b class="b_title">Genero: </b>
                                <b class="b_subtitle">{{$pr->genero}}</b>
                            </p>
                        </div>
                        <div class="col-md-4" style="text-align: center;">
                            <p>
                                <b class="b_title">Talla: </b>
                                <b class="b_subtitle">{{$pr->talla}}</b>
                            </p>
                        </div>
                        <div class="col-md-4" style="text-align: right;">
                            <p>
                                <b class="b_title">Linea: </b>
                                <b class="b_subtitle">{{$pr->linea}}</b>
                            </p>
                        </div>
                    </div>
                    <p></p><hr style="width:700px; margin: 0;"><p></p>
                    <div class="row">
                        <div class="col-md-6" style="text-align: right;">
                            <p>
                                <b class="b_title">Categoria: </b>
                                <b class="b_subtitle">{{$pr->categoria}}</b>
                            </p>
                        </div>
                        <div class="col-md-6" style="text-align: left;">
                            <p>
                                <b class="b_title">Ubicacion: </b>
                                <b class="b_subtitle">{{$pr->ubicacion}}</b>
                            </p>
                        </div>
                    </div>
                    <p></p><hr style="width:700px; margin: 0;"><p></p>
                    <div class="row">
                        <div class="col-md-6" style="text-align: right;">
                            <p>
                                <b class="b_title">Plataforma: </b>
                                <b class="b_subtitle">{{$pr->plataforma}}</b>
                            </p>
                        </div>
                        <div class="col-md-6" style="text-align: left;">
                            <p>
                                <b class="b_title">Marca: </b>
                                <b class="b_subtitle">{{$pr->marca}}</b>
                            </p>
                        </div>
                    </div>
                    <p></p><hr style="width:700px; margin: 0;"><p></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-outline-dark" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cerrar</button>
                </form>
            </div>    
        </div>
    </div>
</div>

