<?php
include('header.php');
?>

<div class="container-fluid" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">

                    

                    <h1>Συνολικοί Πόντοι</h1>
                    <h3 id="points" style="padding: 100px; border: solid #375ece 4px;font-size: 4rem; border-radius: 100%; font-weight: bold; margin-top: 2rem;"></h3>

                </div>
                <!-- /.container-fluid -->

            </div>
            <script>
            $(function () {
                                    
                                    var xhrSearchFields = new XMLHttpRequest();
                                    xhrSearchFields.onreadystatechange = function() {
                                        if (xhrSearchFields.readyState == XMLHttpRequest.DONE) {
                                            var data = JSON.parse(xhrSearchFields.responseText);
                                            
                                            var counter = 0;
                                            var i = setInterval(function(){
                                                document.getElementById("points").innerHTML = counter;

                                                counter++;
                                                if(counter > data["points"]) {
                                                    clearInterval(i);
                                                }
                                            }, 20);
                                            
                                
                                        }
                                        
                                }
                                xhrSearchFields.open('GET', 'api/getPoints.php', true);
                                        xhrSearchFields.send(null);
                                });

                
            </script>
            <!-- End of Main Content -->

            <?php
include('footer.php');
?>