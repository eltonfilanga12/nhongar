</div>

<!-- Custom template | don't include it in your project! -->
<div class="custom-template">
  <div class="title">Settings</div>
  <div class="custom-content">
    <div class="switcher">
      <div class="switch-block">
        <h4>Logo Header</h4>
        <div class="btnSwitch">
          <button type="button" class="selected changeLogoHeaderColor" data-color="dark"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="blue"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
          <br />
          <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
          <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
        </div>
      </div>
      <div class="switch-block">
        <h4>Navbar Header</h4>
        <div class="btnSwitch">
          <button type="button" class="changeTopBarColor" data-color="dark"></button>
          <button type="button" class="changeTopBarColor" data-color="blue"></button>
          <button type="button" class="changeTopBarColor" data-color="purple"></button>
          <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
          <button type="button" class="changeTopBarColor" data-color="green"></button>
          <button type="button" class="changeTopBarColor" data-color="orange"></button>
          <button type="button" class="changeTopBarColor" data-color="red"></button>
          <button type="button" class="selected changeTopBarColor" data-color="white"></button>
          <br />
          <button type="button" class="changeTopBarColor" data-color="dark2"></button>
          <button type="button" class="changeTopBarColor" data-color="blue2"></button>
          <button type="button" class="changeTopBarColor" data-color="purple2"></button>
          <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
          <button type="button" class="changeTopBarColor" data-color="green2"></button>
          <button type="button" class="changeTopBarColor" data-color="orange2"></button>
          <button type="button" class="changeTopBarColor" data-color="red2"></button>
        </div>
      </div>
      <div class="switch-block">
        <h4>Sidebar</h4>
        <div class="btnSwitch">
          <button type="button" class="changeSideBarColor" data-color="white"></button>
          <button type="button" class="selected changeSideBarColor" data-color="dark"></button>
          <button type="button" class="changeSideBarColor" data-color="dark2"></button>
        </div>
      </div>
    </div>
  </div>
  <div class="custom-toggle">
    <i class="icon-settings"></i>
  </div>
</div>
<!-- End Custom template -->
</div>
<!--   Core JS Files   -->
<script src="../../public/js/core/jquery-3.7.1.min.js"></script>
<script src="../../public/js/core/popper.min.js"></script>
<script src="../../public/js/core/bootstrap.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="../../public/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Chart JS -->
<script src="../../public/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="../../public/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="../../public/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="../../public/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="../../public/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="../../public/js/plugin/jsvectormap/jsvectormap.min.js"></script>
<script src="../../public/js/plugin/jsvectormap/world.js"></script>

<!-- Sweet Alert -->
<script src="../../public/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Kaiadmin JS -->
<script src="../../public/js/kaiadmin.min.js"></script>

<!-- Kaiadmin DEMO methods, don't include it in your project! -->
<script src="../../public/js/setting-demo.js"></script>
<script src="../../public/js/demo.js"></script>
<script>
  $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
    type: "line",
    height: "70",
    width: "100%",
    lineWidth: "2",
    lineColor: "#177dff",
    fillColor: "rgba(23, 125, 255, 0.14)",
  });

  $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
    type: "line",
    height: "70",
    width: "100%",
    lineWidth: "2",
    lineColor: "#f3545d",
    fillColor: "rgba(243, 84, 93, .14)",
  });

  $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
    type: "line",
    height: "70",
    width: "100%",
    lineWidth: "2",
    lineColor: "#ffa534",
    fillColor: "rgba(255, 165, 52, .14)",
  });
</script>

<script>
  $(document).ready(function() {
    $("#basic-datatables").DataTable({});

    $("#multi-filter-select").DataTable({
      pageLength: 5,
      initComplete: function() {
        this.api()
          .columns()
          .every(function() {
            var column = this;
            var select = $(
                '<select class="form-select"><option value=""></option></select>'
              )
              .appendTo($(column.footer()).empty())
              .on("change", function() {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                column
                  .search(val ? "^" + val + "$" : "", true, false)
                  .draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function(d, j) {
                select.append(
                  '<option value="' + d + '">' + d + "</option>"
                );
              });
          });
      },
    });

    // Add Row
    $("#add-row").DataTable({
      pageLength: 5,
    });

    var action =
      '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

    $("#addRowButton").click(function() {
      $("#add-row")
        .dataTable()
        .fnAddData([
          $("#addName").val(),
          $("#addPosition").val(),
          $("#addOffice").val(),
          action,
        ]);
      $("#addRowModal").modal("hide");
    });
  });
</script>


<!--Script das Imagens-->
<script>
  function previewImagemPrincipal(input) {
    const file = input.files[0];
    const preview = document.getElementById('preview-principal');
    const placeholder = document.getElementById('placeholder-principal');

    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
        placeholder.style.display = 'none';
      };
      reader.readAsDataURL(file);
    }
  }

  function previewGaleria(input) {
    const container = document.getElementById('preview-galeria');
    container.innerHTML = '';

    Array.from(input.files).forEach(file => {
      const reader = new FileReader();
      reader.onload = function(e) {
        const thumb = document.createElement('div');
        thumb.classList.add('thumb');

        const img = document.createElement('img');
        img.src = e.target.result;

        thumb.appendChild(img);
        container.appendChild(thumb);
      };
      reader.readAsDataURL(file);
    });

    // Adiciona novamente o placeholder "+" ao final
    const placeholder = document.createElement('div');
    placeholder.className = 'thumb';
    placeholder.innerHTML = '<span>+</span>';
    placeholder.onclick = () => document.getElementById('input-galeria').click();
    container.appendChild(placeholder);
  }
</script>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    fetch('/api/categorias')
      .then(res => res.json())
      .then(data => {
        const select = document.getElementById('select-categoria');
        data.forEach(c => {
          const option = document.createElement('option');
          option.value = c.id;
          option.textContent = c.nome;
          select.appendChild(option);
        });
      });

    fetch('/api/Status.php')
      .then(res => res.json())
      .then(data => {
        const select = document.getElementById('select-status');
        data.forEach(s => {
          const option = document.createElement('option');
          option.value = s.id;
          option.textContent = s.nome;
          select.appendChild(option);
        });
      });
  });
</script>

<!-- Tagify -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>

<script>
  // Inicializa o Tagify no campo de tags
  var input = document.querySelector('input[name=tags]');
  new Tagify(input, {
    whitelist: [], // Você pode preencher com tags comuns se quiser
    maxTags: 10,
    dropdown: {
      maxItems: 20,
      enabled: 0,
      closeOnSelect: false
    }
  });
</script>

<script>
  function previewLogotipo(input) {
    const file = input.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById("preview-logotipo").src = e.target.result;
        document.getElementById("preview-logotipo").style.display = "block";
        document.getElementById("placeholder-logotipo").style.display = "none";
      }
      reader.readAsDataURL(file);
    }
  }

  function previewBanners(input) {
    const previewContainer = document.getElementById("preview-banners");
    previewContainer.innerHTML = "";

    const files = input.files;
    if (files.length > 3) {
      alert("Você pode selecionar no máximo 3 banners.");
      input.value = ""; // limpa
      return;
    }

    for (let i = 0; i < files.length; i++) {
      const reader = new FileReader();
      reader.onload = function(e) {
        const thumb = document.createElement("div");
        thumb.classList.add("thumb");

        const img = document.createElement("img");
        img.src = e.target.result;

        thumb.appendChild(img);
        previewContainer.appendChild(thumb);
      };
      reader.readAsDataURL(files[i]);
    }

    // Adiciona botão "+" no final
    const addThumb = document.createElement("div");
    addThumb.classList.add("thumb");
    addThumb.innerHTML = "<span>+</span>";
    previewContainer.appendChild(addThumb);
  }
</script>

</body>

</html>