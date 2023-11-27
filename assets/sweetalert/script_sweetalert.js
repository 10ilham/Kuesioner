// const flashData = $(".flash-data").data("flashdata");

// if (flashData) {
//   swal({
//     title: "Success",
//     text: "Data Berhasil" + flashData,
//     type: "success",
//   });
// }

const flashData = $(".flash-data").data("flashdata");

if (flashData) {
  swal({
    title: "Success",
    text: " " + flashData,
    type: "success",
  });
}

const flashDataGagal = $(".flash-data-gagal").data("flashdatagagal");
if (flashDataGagal) {
  swal({
    title: "Gagal",
    text: " " + flashDataGagal,
    type: "error",
  });
}

//tombol hapus
$(".tombol-hapus").on("click", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");

  swal(
    {
      title: "Anda Yakin",
      text: "Data Ingin Dihapus?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Hapus",
      closeOnConfirm: false,
    },
    function () {
      document.location.href = href;
    }
  );
});

//tombol logout
$(".tombol-logout").on("click", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");

  swal(
    {
      title: "Logout?",
      text: "Apakah Anda Ingin Logout?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Logout",
      closeOnConfirm: false,
    },
    function () {
      document.location.href = href;
    }
  );
});
