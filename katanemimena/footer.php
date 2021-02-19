
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Αποσύνδεση</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Πατήστε "Αποσύνδεση" αν επιθυμείτε να αποδυνδεθείτε.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Ακύρωση</button>
                    <a class="btn btn-primary" href="login.html">Αποσύνδεση</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    

 
    <!-- FOR TABLES --->
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>



    <!-- FOR BTNS -->
    <script>
        function enableBtn() {
            document.getElementById("exampleFirstName").disabled = false;
            document.getElementById("exampleLastName").disabled = false;
            document.getElementById("role").disabled = false;
            document.getElementById("department").disabled = false;
            document.getElementById("birthday").disabled = false;
            document.getElementById("phone").disabled = false;
            document.getElementById("exampleInputEmail").disabled = false;
        } 
        function disableBtn() {
            document.getElementById("exampleFirstName").disabled = true;
            document.getElementById("exampleLastName").disabled = true;
            document.getElementById("role").disabled = true;
            document.getElementById("department").disabled = true;
            document.getElementById("birthday").disabled = true;
            document.getElementById("phone").disabled = true;
            document.getElementById("exampleInputEmail").disabled = true;
        }
    </script>


</body>

</html>