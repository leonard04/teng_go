<!DOCTYPE html>
<html lang="en">
<head>
    <title>TENG GO</title>
    <?= $this->include('layouts/head') ?>
   
    <?= $this->renderSection('css') ?>
</head>
<body id="kt_body" class="header-fixed header-mobile-fixed page-loading-enabled">
    <!--begin::Main-->
    <!--begin::Header Mobile-->
    <?= $this->include('layouts/header_mobile') ?>
    
    <!--end::Header Mobile-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
             <?= $this->include('layouts/header') ?>

            <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" style="background-color: #e6e6e6" id="kt_content">
                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container-fluid">
                            <!--begin::Dashboard-->
                            <!-- Content here -->
                        <?= $this->renderSection('content') ?>
                        <!--end::Dashboard-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>
                <!--end::Content-->
             <?= $this->include('layouts/footer') ?>

            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--begin::Quick Panel-->
    <?= $this->include('layouts/quick_panel') ?>
    
    <!--end::Quick Panel-->
    <!--begin::Quick User -->
    <?= $this->include('layouts/quick_user') ?>

    <!--end::Quick User -->

    <?= $this->include('layouts/scripts') ?>

    <?= $this->renderSection('custom_script') ?>

    <script>
        $(document).ready(function(){
            window.addEventListener("scroll", function () {
                var body = document.getElementById('kt_body')
                if (body.hasAttribute('data-header-scroll') === true){
                    $(".header-bottom").css('border-bottom', '5px solid #f1f1f6')
                }
            })

            $("span.menu-text").addClass('text-dark')
        })
    </script>
</body>
</html>
