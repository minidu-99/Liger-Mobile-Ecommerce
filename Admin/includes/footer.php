</div>

    <!-- Scripts -->



    <!-- Jquery -->
    <script src="js/jquery-3.7.1.min.js"></script>

    <!-- Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    
    <!-- ALERTYFY js JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- Custom JS -->
    <script src="js/scripts.js"></script>
    

    <!-- Sweet alerts -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/custom.js"></script>

    <script>

      // Add new color input
    document.getElementById('addColorBtn').addEventListener('click', function () {
        const colorInputs = document.getElementById('colorInputs');
        const div = document.createElement('div');
        div.classList.add('input-group', 'mb-3');
        div.innerHTML = `
            <input type="text" name="colors[]" class="form-control" placeholder="EX: Purple" required>
            <button class="btn btn-danger remove-color-btn" type="button">Remove</button>
        `;
        colorInputs.appendChild(div);
    });

    // Remove color input
    document.getElementById('colorInputs').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-color-btn')) {
            e.target.parentElement.remove();
        }
    });

    // Add new storage input
    document.getElementById('addStorageBtn').addEventListener('click', function () {
        const storageInputs = document.getElementById('storageInputs');
        const div = document.createElement('div');
        div.classList.add('input-group', 'mb-3');
        div.innerHTML = `
            <input type="text" name="storages[]" class="form-control" placeholder="EX: 256GB" required>
            <button class="btn btn-danger remove-storage-btn" type="button">Remove</button>
        `;
        storageInputs.appendChild(div);
    });

    // Remove storage input
    document.getElementById('storageInputs').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-storage-btn')) {
            e.target.parentElement.remove();
        }
    });
      alertify.set('notifier','position', 'top-right');
      <?php
      if(isset($_SESSION['message'])){ 
        ?>
        
        alertify.success('<?=$_SESSION['message'] ?>');
        <?php
        unset($_SESSION['message']);
       } ?>
    </script>
  </body>
</html>