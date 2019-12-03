<!--Modal: Generico para Delete -->

<div class="modal fade" id="{{ isset($modal) ? $modal : 'myModal' }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger align-center" role="document">
        <!--Content-->
        <div class="modal-content text-center">
            <!--Header-->
            <div class="modal-header d-flex justify-content-center">
                <h4 class="modal-title">Confirmar exclusão</h4>
            </div>

            <!--Body-->
            <div class="modal-body">
                <p class="heading">{{ isset($message) ? $message : 'Alerta' }}</p>
            </div>

            <!--Footer-->
            <div class="modal-footer text-center mt-3">
                <button class="btn  btn btn-success"  data-dismiss="modal" onclick="confirmar();">Confirmar
                </button>
                <button class="btn  btn btn-danger" data-dismiss="modal" >Cancelar
                </button>
            </div>

            {{-- <div class="modal-footer flex-center">
                <a href="#" onclick="confirmar();" class="btn  btn-primary-modal green">Confirmar</a>
                <a type="button" class="btn  btn-primary-modal red" data-dismiss="modal">Cancelar</a>
            </div> --}}
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: modalConfirmDelete-->
@section('scripts')
<script>
    var id = null;
    $(function(){
        $(document).on('click', '[data-toggle="modal"]', function(event){
            event.preventDefault();
            target = $(this).attr("data-target");
            id = $(this).attr("id");
        });
    });

    function confirmar(){
        event.preventDefault();
        //$( "#{{ $idForm }}"+id ).submit(); //Com esse metodo Jquery tbm funciona
        document.getElementById("{{ $idForm }}"+id).submit(); //esse javascript é mais facil de intender
    }
</script>
@endsection
