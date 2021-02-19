<?php
include('header.php');
?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

                     <!-- Page Heading -->
                     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Δημιουργία νέου έργου</h1>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 mb-6 mb-sm-0">
                            <label for="type">Τύπος έργου:</label>
                            <select id="type" name="type" class="form-control form-control-user">
                                <option value="blank">Επιλέξτε...</option>
                                <option value="2">Επιτηρήσεις</option>
                                <option value="1">Διδασκαλία εργαστηρίων</option>
                                <option value="3">Διορθώσεις γραπτών</option>
                            </select>
                        </div>
                        
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-6 mb-sm-0">
                            <label for="info">Πληροφορίες έργου:</label>
                            <textarea id="info" name="info" class="form-control form-control-user">

                            </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-6 mb-sm-0">
                            <label for="candidate">Υποφήψιος Διδάκτορας:</label>
                            <select id="candidate" name="type" class="form-control form-control-user">
                                <option value="blank">Επιλέξτε...</option>
                                
                            </select>
                        </div>
                        
                    </div>

                    
                

                    <a id="sendBtn" class="btn btn-primary btn-user btn-block col-sm-2">
                        Αποθήκευση
                    </a>
   
                </div>
                <!-- /.container-fluid -->

            </div>
            <script>
                            $(function () {
                        
                                var xhrSearchFields = new XMLHttpRequest();
                                xhrSearchFields.onreadystatechange = function() {
                                    if (xhrSearchFields.readyState == XMLHttpRequest.DONE) {
                                        var data = JSON.parse(xhrSearchFields.responseText);
                                        var options;
                                        console.log("Length: " + data.length);
                                        options= "<option value='blank'>Επιλέξτε...</option>";
                                        console.log(data[0]);
                                        for(var i=0;i<data.length;i++){
                                            console.log(data[i]);
                                            options += "<option value='"+data[i]["id"]+"'>"+data[i]["firstName"]+" "+data[i]["lastName"]+"</option>";

                                        }
                                        
                                        document.getElementById("candidate").innerHTML = options;
                                    }
                                    
                            }
                            xhrSearchFields.open('GET', 'api/getCandidates.php', true);
                                    xhrSearchFields.send(null);
                            });

                            $("#sendBtn").click(function(e){
                                e.preventDefault();
                                var xhrSearchFields = new XMLHttpRequest();
                                var tmp = new FormData();
                                xhrSearchFields.onreadystatechange = function() {
                                    if (xhrSearchFields.readyState == XMLHttpRequest.DONE) {
                                        var data = JSON.parse(xhrSearchFields.responseText);
                                        
                                        if(data["status"]==="success"){
                                            document.getElementById("modal-title").innerHTML = "Added New Task";
                                            document.getElementById("modal-text").innerHTML = "You Have Created a New Task"                    
                                            $("#myModal").modal('show');
                                        
                                        }else{
                                            document.getElementById("modal-title").innerHTML = "Unable to Add The New Task";
                                            document.getElementById("modal-text").innerHTML = "Pleace Contact Tech Support"                    
                                            $("#myModal").modal('show');
                                        }
                                       
                                    }
                                    
                            }
                                tmp.append("candidate",document.getElementById("candidate").value);
                                tmp.append("type",document.getElementById("type").value);
                                tmp.append("description",document.getElementById("info").value);
                               
                                xhrSearchFields.open('POST', 'api/addNewTask.php', true);
                                    xhrSearchFields.send(tmp);
                            });
                        
            </script>  
            <!-- End of Main Content -->

<!-- End of Main Content -->
  
<?php
include('footer.php');
?>