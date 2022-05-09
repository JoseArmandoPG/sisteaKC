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
                    <img src ="{{asset('archivos/'.$pr->foto)}}" class="col-md-5 col-sm-5" style="max-width:275px; width:100%; float:left;">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table" width="100%">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <td style="text-align:left;">{{$pr->codigo}}</td>
                                    </tr>
                                    <tr>
                                        <th>Producto</th>
                                        <td style="text-align:left;">{{$pr->producto}}</td>
                                    </tr>
                                    <tr>
                                        <th>Modelo</th>
                                        <td style="text-align:left;">{{$pr->modelo}}</td>
                                    </tr>
                                    <tr>
                                        <th>Unidad</th>
                                        <td style="text-align:left;">{{$pr->unidad}}</td>
                                    </tr>
                                    <tr>
                                        <th>Stock</th>
                                        <td style="text-align:left;">{{$pr->stock}}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td style="text-align:left;">{{$pr->status}}</td>
                                    </tr>
                                    <tr>
                                        <th>Precio</th>
                                        <td style="text-align:left;">$ {{$english_format_number=number_format($pr->precio)}}</td>
                                    </tr>
                                    <tr>
                                        <th>Iva</th>
                                        <td style="text-align:left;">$ {{$english_format_number=number_format($pr->iva)}}</td>
                                    </tr>
                                    <tr>
                                        <th>Precio + Iva</th>
                                        <td style="text-align:left;">$ {{$english_format_number=number_format($pr->total)}}</td>
                                    </tr>
                                    <tr>
                                        <th>Categoria</th>
                                        <td style="text-align:left;">{{$pr->categoria}}</td>
                                    </tr>
                                    <tr>
                                        <th>Ubicacion</th>
                                        <td style="text-align:left;">{{$pr->ubicacion}}</td>
                                    </tr>
                                    <tr>
                                        <th>Plataforma</th>
                                        <td style="text-align:left;">{{$pr->plataforma}}</td>
                                    </tr>
                                    <tr>
                                        <th>Marca</th>
                                        <td style="text-align:left;">{{$pr->marca}}</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-outline-dark" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cerrar</button>
                </form>
            </div>    
        </div>
    </div>
</div>

