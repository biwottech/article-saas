                                @if(Session('success'))
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            toastr.success('{{ Session::get('success') }}', {
                                                "showMethod": "slideDown",
                                                "hideMethod": "slideUp",
                                                timeOut: 2000
                                            });
                                        });
                                    </script>
                                @endif
                                @if(Session('error'))
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            toastr.error('{{ Session::get('error') }}', {
                                                "showMethod": "slideDown",
                                                "hideMethod": "slideUp",
                                                timeOut: 2000
                                            });
                                        });                                  
                                    </script>
                                @endif


                                @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            toastr.error('{{ $error }}', {
                                                "showMethod": "slideDown",
                                                "hideMethod": "slideUp",
                                                timeOut: 2000
                                            });
                                        });                                  
                                    </script>
                                    @endforeach
                                @endif

