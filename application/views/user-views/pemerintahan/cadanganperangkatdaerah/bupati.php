<title>Bupati</title>
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class=" container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-xl-9">
                <div class="row">
                    <!--begin::Card-->
                    <div class="card card-custom card-stretch">
                        <div class="card-header">
                            <div class="card-title">
                                <h1>Bupati </h1>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="row">

                            </div>

                        </div>
                    </div>
                    <!--end::Card-->
                </div>
            </div>
            <?php $this->load->view('layouts/partials/side.php'); ?>

        </div>
        <!--end::Row-->

    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
<script>
    $(document).ready(function () {

        //set editor1 readonly
        CKEDITOR.replace('editor1', {
            readOnly: true
        });
        CKEDITOR.replace('editor2');

        //set editor2 readonly
        CKEDITOR.instances.editor2.config.readOnly = true;

    });
</script>