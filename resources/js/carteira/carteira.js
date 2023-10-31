function modalClick(){
    Swal.fire({
        title: 'Error!',
        text: 'Do you want to continue',
        icon: 'error',
        confirmButtonText: 'Cool'
      });
}
document.getElementById("myBtn").addEventListener("click", modalClick());