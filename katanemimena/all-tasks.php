<?php
include('header.php');
?>
<?php if (($_SESSION['role'] == 'ROLE_CAN')): ?>
<?php 
    $url = "api/getTasks.php?status=1";
    ?>
    <?php endif; ?>
    <?php if (($_SESSION['role'] == 'ROLE_SUPER')): ?>
<?php 
    $url = "api/getTasks.php?status=-1";
    ?>
    <?php endif; ?>
    <?php if (($_SESSION['role'] == 'ROLE_BOARD')): ?>
<?php 
    $url = "api/getTasks.php?status=0";
    ?>
    <?php endif; ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Όλα τα έργα</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <?php if (($_SESSION['role'] != 'ROLE_CAN')): ?>
                                            <th>Υποψήφιος Διδάκτορας</th>
                                        <?php endif; ?>
                                            <th>Τύπος</th>
                                            <th>Περιγραφή</th>
                                            <th>Κατάσταση</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <script>
             $(function () {
                        
                        var xhrSearchFields = new XMLHttpRequest();
                        xhrSearchFields.onreadystatechange = function() {
                            if (xhrSearchFields.readyState == XMLHttpRequest.DONE) {
                                var data = JSON.parse(xhrSearchFields.responseText);
                                var options="";
                            var type;
                            var status;
                                
                                for(var i=0;i<data.length;i++){
                                    console.log(data[i]);
                                    if(data[i]["type"]===1){
                                        type = "Διδασκαλία Εργαστηρίου";
                                    }else if(data[i]["type"]===2){
                                        type="Επιτήρηση";
                                    }else if(data[i]["type"]===3){
                                        type="Διόρθωση Γραπτών";
                                    }
                                    if(data[i]["status"]===0){
                                        status="<td style='color: orange'>Αναμονή Έγκρισης</td>"
                                    }else if(data[i]["status"]===1){
                                        status="<td style='color: green'>Έχει Εγκριθεί</td>"
                                    }else if(data[i]["status"]===3){
                                        status="<td style='color: green'>Ολοκληρώθηκε</td>"
                                    }else if(data[i]["status"]===4){
                                        status="<td style='color: red'>Απορρίφθηκε</td>"
                                    }else if(data[i]["status"]===2){
                                        status="<td style='color: orange'>Αναμονή Ολοκλήρωσης</td>"
                                    }
                                    <?php if (($_SESSION['role'] != 'ROLE_CAN')): ?>
                                        options += "<tr><td>"+data[i]["firstName"]+" "+data[i]["lastName"]+"</td><td>"+type+"</td><td>"+data[i]["description"]+"</td>"+status+"</tr>";
                                    <?php endif; ?>
                                    <?php if (($_SESSION['role'] == 'ROLE_CAN')): ?>
                                        options += "<tr><td><a href='/katanemimena/task-details.php?id="+data[i].id+"'>"+type+"</a></td><td>"+data[i]["description"]+"</td>"+status+"</tr>";
                                    <?php endif; ?>
                                }
                                
                                document.getElementById("tableBody").innerHTML = options;
                            }
                            
                    }
                    xhrSearchFields.open('GET',"<?php echo $url; ?>",true);
                            xhrSearchFields.send(null);
                    });
            </script>
<?php
include('footer.php');
?>