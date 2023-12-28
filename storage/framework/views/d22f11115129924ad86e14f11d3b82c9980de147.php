<?php if(Session::has('status')): ?>
<script> 
        var type = "<?php echo e(Session::get('status')); ?>"
        switch(type){           
            case 'success':
                Swal.fire({
                icon: 'success',
                title: '<?php echo e(Session::get('title')); ?>',
                text: '<?php echo e(Session::get('message')); ?>',               
                })
            break;
            case 'error':
                Swal.fire({
                icon: 'error',
                title: '<?php echo e(Session::get('title')); ?>',
                text: '<?php echo e(Session::get('message')); ?>',               
                })
            break;
            case 'info':
                Swal.fire({
                icon: 'info',
                title: '<?php echo e(Session::get('title')); ?>',
                text: '<?php echo e(Session::get('message')); ?>',               
                })
            break;
            case 'update':
                Swal.fire({
                icon: 'sucess',
                title: '<?php echo e(Session::get('title')); ?>',
                text: '<?php echo e(Session::get('message')); ?>',               
                })
            break;
            case 'toast_success':
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })

            Toast.fire({
              icon: 'success',
              title: '<?php echo e(Session::get('title')); ?>'
            }) 
    }     
    </script>
<?php endif; ?><?php /**PATH C:\Users\ACER NITRO 5\Downloads\Compressed\laravel-9-simple-templates-main\laravel-9-simple-templates-main\resources\views/notification/sweetalert.blade.php ENDPATH**/ ?>