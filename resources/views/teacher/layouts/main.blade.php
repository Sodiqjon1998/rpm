<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Upcube - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">


    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('assets/libs/spectrum-colorpicker2/spectrum.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet">

    <!-- jquery.vectormap css -->
    <link href="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/css/img.css') }}" rel="stylesheet" type="text/css" />

    <!-- Lightbox css -->
    <link href="{{ asset('assets/libs/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        /* Switch starts here */
        .dropdown-toggle {
            height: 40px;
            width: 400px !important;
        }

        .toggle-border {
            border: 2px solid #f0ebeb;
            border-radius: 130px;
            margin-bottom: 45px;
            padding: 1px 2px;
            background: linear-gradient(to bottom right, white, rgba(220, 220, 220, .5)), white;
            box-shadow: 0 0 0 2px #fbfbfb;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .toggle-border:last-child {
            margin-bottom: 0;
        }

        .toggle-border input[type="checkbox"] {
            display: none;
        }

        .toggle-border label {
            position: relative;
            display: inline-block;
            width: 65px;
            height: 20px;
            background: #d13613;
            border-radius: 80px;
            cursor: pointer;
            box-shadow: inset 0 0 16px rgba(0, 0, 0, .3);
            transition: background .5s;
        }

        .toggle-border input[type="checkbox"]:checked+label {
            background: #13d162;
        }

        .handle {
            position: absolute;
            top: -8px;
            left: -10px;
            width: 35px;
            height: 35px;
            border: 1px solid #e5e5e5;
            background: repeating-radial-gradient(circle at 50% 50%, rgba(200, 200, 200, .2) 0%, rgba(200, 200, 200, .2) 2%, transparent 2%, transparent 3%, rgba(200, 200, 200, .2) 3%, transparent 3%), conic-gradient(white 0%, silver 10%, white 35%, silver 45%, white 60%, silver 70%, white 80%, silver 95%, white 100%);
            border-radius: 50%;
            box-shadow: 3px 5px 10px 0 rgba(0, 0, 0, .4);
            transition: left .4s;
        }

        .toggle-border input[type="checkbox"]:checked+label>.handle {
            left: calc(100% - 35px + 10px);
        }
    </style>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    @yield('css')

</head>

<body data-topbar="dark" data-sidebar="dark" style="background: url({{ asset('images/staticImages/bg2.png') }})">

    <!-- Begin page -->
    <div id="layout-wrapper">


        @include('teacher.layouts.partials._header')

        <!-- ========== Left Sidebar Start ========== -->
        @include('teacher.layouts.partials._sidebar')
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('teacher.layouts.partials._footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    @include('teacher.layouts.partials._rightbar')
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    {{--    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script> --}}
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>


    <!-- apexcharts -->
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- jquery.vectormap map -->
    <script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}">
    </script>

    <!-- Required datatable js -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>

    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('assets/libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>

    <script src="{{ asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>

    <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script src="{{ asset('assets/js/img.js') }}"></script>

    <!--tinymce js-->
    <script src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}"></script>

    <!-- Magnific Popup-->
    <script src="{{ asset('assets/libs/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

    <!-- lightbox init js-->
    <script src="{{ asset('assets/js/pages/lightbox.init.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('assets/js/pages/form-editor.init.js') }}"></script>


    <script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function myFunction() {
            if (!confirm("Ush bu elementni o'chirmoqchimisiz!"))
                event.preventDefault();
        }
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
        (function() {
            var mathElements = [
                'math',
                'maction',
                'maligngroup',
                'malignmark',
                'menclose',
                'merror',
                'mfenced',
                'mfrac',
                'mglyph',
                'mi',
                'mlabeledtr',
                'mlongdiv',
                'mmultiscripts',
                'mn',
                'mo',
                'mover',
                'mpadded',
                'mphantom',
                'mroot',
                'mrow',
                'ms',
                'mscarries',
                'mscarry',
                'msgroup',
                'msline',
                'mspace',
                'msqrt',
                'msrow',
                'mstack',
                'mstyle',
                'msub',
                'msup',
                'msubsup',
                'mtable',
                'mtd',
                'mtext',
                'mtr',
                'munder',
                'munderover',
                'semantics',
                'annotation',
                'annotation-xml'
            ];
            CKEDITOR.plugins.addExternal('ckeditor_wiris',
                'https://ckeditor.com/docs/ckeditor4/4.14.0/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
            CKEDITOR.replace('editor1', {
                extraPlugins: 'ckeditor_wiris,print,format,font,colorbutton,justify,uploadimage,find,magicline,bidi,easyimage,image2,colordialog,tableresize',
                mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
                format_tags: 'p;h1;h2;h3;h4;h5;h6;pre;address;div',
                contentsLangDirection: 'ltr',
                removeButtons: 'ExportPdf,Form,Checkbox,Radio,TextField,Select,Textarea,Button,ImageButton,HiddenField,NewPage,CreateDiv,Flash,Iframe,About,ShowBlocks,Maximize',
                toolbarGroups: [{
                        name: 'clipboard',
                        groups: ['clipboard', 'undo']
                    },
                    {
                        name: 'editing',
                        groups: ['find', 'selection', 'spellchecker']
                    },
                    {
                        name: 'links'
                    },
                    {
                        name: 'insert'
                    },
                    {
                        name: 'forms'
                    },
                    {
                        name: 'tools'
                    },
                    {
                        name: 'document',
                        groups: ['mode', 'document', 'doctools']
                    },
                    {
                        name: 'colors'
                    },
                    {
                        name: 'others'
                    },
                    {
                        name: 'about'
                    },
                    '/',
                    {
                        name: 'basicstyles',
                        groups: ['basicstyles', 'cleanup']
                    },
                    {
                        name: 'paragraph',
                        groups: ['list', 'indent', 'blocks', 'align', 'bidi']
                    },
                    {
                        name: 'styles'
                    }
                ],
                removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
                removeDialogTabs: 'image:advanced;link:advanced',
                height: 320,
                extraAllowedContent: mathElements.join(' ') +
                    '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula);h3{clear};h2{line-height};h2 h3{margin-left,margin-top}; div{border,background,text-align}'
            });
            CKEDITOR.replace('editor2', {
                extraPlugins: 'ckeditor_wiris,print,format,font,colorbutton,justify,uploadimage,find,magicline,bidi,easyimage,image2,colordialog,tableresize',
                mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
                format_tags: 'p;h1;h2;h3;h4;h5;h6;pre;address;div',
                contentsLangDirection: 'ltr',
                removeButtons: 'ExportPdf,Form,Checkbox,Radio,TextField,Select,Textarea,Button,ImageButton,HiddenField,NewPage,CreateDiv,Flash,Iframe,About,ShowBlocks,Maximize',
                toolbarGroups: [{
                        name: 'clipboard',
                        groups: ['clipboard', 'undo']
                    },
                    {
                        name: 'editing',
                        groups: ['find', 'selection', 'spellchecker']
                    },
                    {
                        name: 'links'
                    },
                    {
                        name: 'insert'
                    },
                    {
                        name: 'forms'
                    },
                    {
                        name: 'tools'
                    },
                    {
                        name: 'document',
                        groups: ['mode', 'document', 'doctools']
                    },
                    {
                        name: 'colors'
                    },
                    {
                        name: 'others'
                    },
                    {
                        name: 'about'
                    },
                    '/',
                    {
                        name: 'basicstyles',
                        groups: ['basicstyles', 'cleanup']
                    },
                    {
                        name: 'paragraph',
                        groups: ['list', 'indent', 'blocks', 'align', 'bidi']
                    },
                    {
                        name: 'styles'
                    }
                ],
                removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
                removeDialogTabs: 'image:advanced;link:advanced',
                height: 320,
                extraAllowedContent: mathElements.join(' ') +
                    '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula);h3{clear};h2{line-height};h2 h3{margin-left,margin-top}; div{border,background,text-align}'
            });
        }());
    </script>

    @yield('js')
</body>

</html>
