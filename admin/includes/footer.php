<footer class="footer pt-5">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-12 mb-lg-0 mb-4 ">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              <script>
                document.write(new Date().getFullYear())
              </script> © Kape Catalina's Coffee House
              
             
            </div>
          </div>
        <!-- <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="#" class="nav-link text-muted" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link text-muted" target="_blank">Contact</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link text-muted" target="_blank">Location</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link pe-0 text-muted" target="_blank">Services</a>
              </li>
            </ul>
          </div> -->
        </div>
      </div> 
    </footer>
  </main>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/scroller/2.1.0/js/dataTables.scroller.min.js"></script>

        <script src="assets/js/jquery-3.6.1.min.js"></script>
        
          <script src="assets/js/bootstrap.bundle.min.js"></script>
          <script src="assets/js/perfect-scrollbar.min.js"></script>
          <script src="assets/js/smooth-scrollbar.min.js"></script>

          <script src="assets/js/custom-qty.js"></script>

          <script src="assets/js/custom.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <!-- jquery datatable -->
        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script>
          $(document).ready( function () {
          $('#myDataTable').DataTable();
          } );
        </script>

        <!-- Alertify JavaScript -->
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

        <script>

            <?php if(isset($_SESSION['message'])) 
            { ?>
                alertify.set('notifier','position', 'top-center');
                alertify.success('<?= $_SESSION['message']; ?>');
              <?php 
                unset($_SESSION['message']);
            } 
             ?>
        </script>

    <!-- to limit input character -->
    <script>
        const input = document.getElementById("comments"),
        counter = document.getElementById("counter"),
        maxlength = input.getAttribute("maxlength");

        input.onkeyup = ()=>{
            counter.innerText = maxlength - input.value.length;
        }
    </script>

         <!-- for toggle switch -->
    <script>
        // JavaScript to handle the toggle switch
        var toggle = document.getElementById("toggle");

        toggle.addEventListener("change", function() {
        if (this.checked) {
            // The toggle is on
            console.log("On");
        } else {
            // The toggle is off
            console.log("Off");
        }
        });

    </script>

  </body>
</html>