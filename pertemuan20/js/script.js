$(() => {
  // hilangkan tombol cari
  $('#tombol-cari').hide();

  // event ketika keyword ditulis
  $('#keyword').on('keyup', () => {
    // munculkan icon loading
    $('.loader').show();

    // ajax menggunakan load
    // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

    // $.get() mirip dengan load
    $.get(`ajax/mahasiswa.php?keyword=${$('#keyword').val()}`, (data) => {
      $('#container').html(data);
      $('.loader').hide();
    });
  });
});
