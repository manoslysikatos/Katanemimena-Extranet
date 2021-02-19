<?php
include('header.php');
?>


    <!-- Begin Page Content -->
    <div class="container-fluid" style="display:flex;flex-direction: row;">
        <div class="col-xl-6">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 id="title" class="h3 mb-0 text-gray-800">[Τίτλος]</h1>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <label for="studentname">Ονοματεπώνυμο Υποψηφίου:</label>
                <input type="text" class="form-control form-control-user" id="studentName"
                    placeholder="[Ονοματεπώνυμο]" disabled>
            </div>
            <div class="col-sm-6">
                <label for="profname">Ονοματεπώνυμο Καθηγητή:</label>
                <input type="text" class="form-control form-control-user" id="profName"
                    placeholder="[Ονοματεπώνυμο]" disabled>
            </div>
        </div>

        <div class="form-group row">
        <div class="col-sm-3">
                <label for="taskID">Αναγνωριστικό Έργου:</label>
                <input type="text" class="form-control form-control-user" id="taskID"
                    placeholder="Αναγνωριστικό Έργου" disabled>
            </div>
            <div class="col-sm-8">
                <label for="taskType">Τύπος Έργου:</label>
                <input type="text" class="form-control form-control-user" id="taskType"
                    placeholder="[Τύπος]" disabled>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label for="profname">Σύντομη Περιγραφή:</label>
                <textarea id="info" name="info" class="form-control form-control-user" disabled>
[Πληροφορίες]
                </textarea>
            </div>
        </div>
        <?php if (($_SESSION['role'] != 'ROLE_CAN')): ?>
        <div style="display: flex; flex-direction: row; align-items: center; justify-content: space-between;">
            <div class="col-sm-6">
                <a onclick="disapproveTask()" class="form-control form-control-user btn btn-secondary">
                    Απόρριψη
                </a>
            </div>
            <div class="col-sm-6">
                <a onclick="approveTask()" id="approveBtn" class="form-control form-control-user btn btn-primary">
                    Αποδοχή
                </a>
            </div>
            </div>
        </div>
        <div class="col-xl-6">
        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Έργο</th>
                                            <th>Επιβλέπων</th>
                                            <th>Πόντοι</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                       
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php endif; ?> 
                        <?php if (($_SESSION['role'] == 'ROLE_CAN')): ?>
                        <div class="col-sm-6">
                <a onclick="approveTask()" id="approveBtn" class="form-control form-control-user btn btn-primary">
                    Δήλωση Ολοκλήρωσης
                </a>
            </div>
            <?php endif; ?>
        </div>
              
        </div>
        <!-- /.container-fluid -->
    <script>
    $(function () {
                        
                        var xhrSearchFields = new XMLHttpRequest();
                        xhrSearchFields.onreadystatechange = function() {
                            if (xhrSearchFields.readyState == XMLHttpRequest.DONE) {
                                var data = JSON.parse(xhrSearchFields.responseText);
                                var options="";
                                console.log(data[0]);
                                for(var i=0;i<data.length;i++){
                                    console.log("enterLoop");
                                    if(data[i]["type"]===1){
                                        options += "<tr><td><a style='color: #345bcb;cursor:pointer;' onclick='getInfo("+data[i]["id"]+")'>Διδασκαλία Εργαστηρίου</a></td><td>"+data[i]["supervisor"]+"</td><td>"+data[i]["points"]+"</td></tr>";
                                    }else if(data[i]["type"]===2){
                                        options += "<tr><td><a style='color: #345bcb;cursor:pointer;' onclick='getInfo("+data[i]["id"]+")'>Επιτήρηση</a></td><td>"+data[i]["supervisor"]+"</td><td>"+data[i]["points"]+"</td></tr>";
                                    }else if(data[i]["type"]===3){
                                        options += "<tr><td><a style='color: #345bcb;cursor:pointer;' onclick='getInfo("+data[i]["id"]+")'>Διόρθωση Γραπτών</a></td><td>"+data[i]["supervisor"]+"</td><td>"+data[i]["points"]+"</td></tr>";
                                    }
                                   

                                }
                                console.log(options);
                                document.getElementById("tableBody").innerHTML = options;
                            }
                            
                    }
                    xhrSearchFields.open('GET', 'api/getTaskWaitingForBoardApproval.php', true);
                            xhrSearchFields.send(null);
                    });

            function getInfo(id){
                var xhrSearchFields = new XMLHttpRequest();
                        xhrSearchFields.onreadystatechange = function() {
                            if (xhrSearchFields.readyState == XMLHttpRequest.DONE) {
                                var data = JSON.parse(xhrSearchFields.responseText);
                                document.getElementById("studentName").value = data["candidate"];
                                document.getElementById("profName").value = data["supervisor"];
                                document.getElementById("info").value = data["description"];
                                switch(data["type"]){
                                    case 1:
                                        document.getElementById("taskType").value = "Διδασκαλία Εργαστηρίου";
                                        document.getElementById("title").innerHTML = "Διδασκαλία Εργαστηρίου";
                                        break;
                                    case 2:
                                        document.getElementById("taskType").value = "Επιτήρηση";
                                        document.getElementById("title").innerHTML = "Επιτήρηση";
                                        break;
                                    case 3:
                                        document.getElementById("taskType").value = "Διόρθωση Γραπτών";
                                        document.getElementById("title").innerHTML = "Διόρθωση Γραπτών";
                                        break;
                                }
                                document.getElementById("taskID").value = data["id"];
                                    

                              
                            }
                            
                    }
                    xhrSearchFields.open('GET', 'api/getTask.php?id='+id, true);
                            xhrSearchFields.send(null);
            }
            function approveTask(id){
                var tmp = new FormData();
                var xhrSearchFields = new XMLHttpRequest();
                        xhrSearchFields.onreadystatechange = function() {
                            if (xhrSearchFields.readyState == XMLHttpRequest.DONE) {
                                var data = JSON.parse(xhrSearchFields.responseText);
                                if(data["success"]){
                                    alert("success");
                                }else{
                                    alert("fail");
                                }
                               
                                    

                              
                            }
                            
                    }
                    tmp.append("id",document.getElementById("taskID").value);
                    xhrSearchFields.open('POST', 'api/approveTask.php', true);
                            xhrSearchFields.send(tmp);
            }
            function disapproveTask(id){
                var tmp = new FormData();
                var xhrSearchFields = new XMLHttpRequest();
                        xhrSearchFields.onreadystatechange = function() {
                            if (xhrSearchFields.readyState == XMLHttpRequest.DONE) {
                                var data = JSON.parse(xhrSearchFields.responseText);
                                if(data["success"]){
                                    alert("success");
                                }else{
                                    alert("fail");
                                }
                               
                                    

                              
                            }
                            
                    }
                    tmp.append("id",document.getElementById("taskID").value);
                    xhrSearchFields.open('POST', 'api/disapproveTask.php', true);
                            xhrSearchFields.send(tmp);
            }
    </script>
     <?php if (($_SESSION['role'] == 'ROLE_CAN')): ?>
        <?php 
            if(isset($_GET["id"])&&$_GET["id"]!=""){
                $task_id  = $_GET["id"];
            } 
        ?>  
        <script>
            getInfo(<?php echo $task_id; ?>);
        </script>
    <?php endif;?>
    </div>
    <!-- End of Main Content -->
    <?php
include('footer.php');
?>