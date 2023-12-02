$(document).ready(function () {
  function initializeDataTable(tableId) {
    $(tableId).removeAttr("hidden");
    $(tableId).DataTable({
      scrollX: true,
    });
  }
  initializeDataTable("#sfmdatatable");
  initializeDataTable("#sfsdatatable");
  initializeDataTable("#cfmdatatable");
  initializeDataTable("#cfsdatatable");
  initializeDataTable("#swotdatatable");
  if ($(".ajax-form").length) {
    $(".ajax-form").submit(function (e) {
      e.preventDefault();
      const formData = $(this).serialize();
      $.ajax({
        type: "POST",
        url: "includes/process.php",
        data: formData,
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            Swal.fire({
              icon: "success",
              title: "Success",
              text: response.message,
            });
            if (response.redirect) {
              setTimeout(function () {
                location = response.redirect;
              }, 750);
            }
          }
          if (response.status === "error") {
            Swal.fire({
              icon: "error",
              title: "Error",
              text: response.message,
            });
            if (response.redirect) {
              setTimeout(function () {
                location = response.redirect;
              }, 750);
            }
          }
        },
        error: function () {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "An error occurred.",
          });
        },
      });
    });
  }
  if ($("#MSME").length) {
    $("#MSME").submit(function (e) {
      e.preventDefault();
      const formData = $(this).serialize();
      $.ajax({
        type: "POST",
        url: "includes/process.php",
        data: formData,
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            location = response.redirect;
          }
          if (response.status === "error") {
            Swal.fire({
              icon: "error",
              title: "Error",
              text: response.message,
            });
            if (response.redirect) {
              setTimeout(function () {
                location = response.redirect;
              }, 750);
            }
          }
        },
        error: function () {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "An error occurred.",
          });
        },
      });
    });
  }
  if ($("#SuccessFactor").length) {
    $("#SuccessFactor").submit(function (e) {
      e.preventDefault();
      const formData = $(this).serialize();
      $.ajax({
        type: "POST",
        url: "includes/process.php",
        data: formData,
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            window.location.href = response.redirect;
          }
          if (response.status === "error") {
            Swal.fire({
              icon: "error",
              title: "Error",
              text: response.message,
            });
            if (response.redirect) {
              setTimeout(function () {
                location = response.redirect;
              }, 750);
            }
          }
        },
        error: function () {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "An error occurred.",
          });
        },
      });
    });
  }
  if ($("#SWOT").length) {
    $("#SWOT").submit(function (e) {
      e.preventDefault();
      const formData = $(this).serialize();
      $.ajax({
        type: "POST",
        url: "includes/process.php",
        data: formData,
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            Swal.fire({
              icon: "success",
              title: "Success",
              text: response.message,
            });
            if (response.redirect) {
              setTimeout(function () {
                location = response.redirect;
              }, 750);
            }
          }
          if (response.status === "error") {
            Swal.fire({
              icon: "error",
              title: "Error",
              text: response.message,
            });
            if (response.redirect) {
              setTimeout(function () {
                location = response.redirect;
              }, 750);
            }
          }
        },
        error: function () {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "An error occurred.",
          });
        },
      });
    });
  }
  if ($("#CompetitorsFeature").length) {
    $("#CompetitorsFeature").submit(function (e) {
      e.preventDefault();
      const formData = $(this).serialize();
      $.ajax({
        type: "POST",
        url: "includes/process.php",
        data: formData,
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            Swal.fire({
              icon: "success",
              title: "Success",
              text: response.message,
            });
            if (response.redirect) {
              setTimeout(function () {
                location = response.redirect;
              }, 750);
            }
          }
          if (response.status === "error") {
            Swal.fire({
              icon: "error",
              title: "Error",
              text: response.message,
            });
            if (response.redirect) {
              setTimeout(function () {
                location = response.redirect;
              }, 750);
            }
          }
        },
        error: function () {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "An error occurred.",
          });
        },
      });
    });
  }
  if ($("#AutoFill").length) {
    $("#AutoFill").submit(function (e) {
      e.preventDefault();
      const formData = $(this).serialize();
      $.ajax({
        type: "POST",
        url: "includes/process.php",
        data: formData,
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            location = response.redirect;
          }
          if (response.status === "error") {
            Swal.fire({
              icon: "error",
              title: "Error",
              text: response.message,
            });
            if (response.redirect) {
              setTimeout(function () {
                location = response.redirect;
              }, 750);
            }
          }
        },
        error: function () {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "An error occurred.",
          });
        },
      });
    });
  }
  if ($(".csv-form").length) {
    $(".csv-form").submit(function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        type: "POST",
        url: "includes/process_csv.php",
        data: formData,
        dataType: "json",
        contentType: false,
        processData: false,
        success: function (response) {
          if (response.status === "success") {
            let scrollPosition = window.scrollY;
            location.reload();
            window.scrollTo(0, scrollPosition);
          }
          if (response.status === "error") {
            Swal.fire({
              icon: "error",
              title: "Error",
              text: response.message,
            });
          }
        },
        error: function () {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "An error occurred.",
          });
        },
      });
    });
  }
  if ($(".manual-form").length) {
    $(".manual-form").submit(function (e) {
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
        type: "POST",
        url: "includes/process.php",
        data: formData,
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            let scrollPosition = window.scrollY;
            location.reload();
            window.scrollTo(0, scrollPosition);
          }
          if (response.status === "error") {
            Swal.fire({
              icon: "error",
              title: "Error",
              text: response.message,
            });
          }
        },
        error: function () {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "An error occurred.",
          });
        },
      });
    });
  }
  if ($("#Logout").length) {
    $("#Logout").on("click", () => {
      Swal.fire({
        title: "Are you sure?",
        text: "You are trying to leave this website!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, sign out!",
      }).then(({ isConfirmed }) => {
        if (isConfirmed) {
          window.location.href = "includes/logout.php";
        }
      });
    });
  }
  if ($("#ShowPassword").length) {
    $("#ShowPassword").on("click", function () {
      $("#Password").attr(
        "type",
        $("#Password").attr("type") == "password" ? "text" : "password",
      );
    });
  }
  function handleEditDeleteSF(elementType, id, successCallback) {
    var data = {};
    data[elementType] = id;
    $.ajax({
      type: "POST",
      url: "includes/get.php",
      data: data,
      dataType: "json",
      success: function (response) {
        if (elementType === "sfm") {
          $("#sfm-name").val(response.Name);
          $("#sfm-description").val(response.Description);
          $("#sfm-rank").val(response.Rank);
          $("#sfm-weight").val(response.Weight);
          $("#edit-sfm").val(response.id);
          $("#edit-sfm-modal").modal("toggle").modal("show");
        } else if (elementType === "sfs") {
          $("#sfm").val(response.SFMID);
          $("#sfs-name").val(response.Name);
          $("#sfs-description").val(response.Description);
          $("#sfs-rank").val(response.Rank);
          $("#sfs-weight").val(response.Weight);
          $("#edit-sfs").val(response.id);
          $("#edit-sfs-modal").modal("toggle").modal("show");
        }
      },
    });
  }
  $(".editsfm-btn, .editsfs-btn").click(function () {
    var elementType = $(this).data("editsfm") ? "sfm" : "sfs";
    var id = $(this).data("editsfm") || $(this).data("editsfs");
    handleEditDeleteSF(elementType, id);
  });
  $(".delsfm-btn, .delsfs-btn").click(function () {
    var elementType = $(this).data("delsfm") ? "sfm" : "sfs";
    var id = $(this).data("delsfm") || $(this).data("delsfs");
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel",
    }).then((result) => {
      if (result.isConfirmed) {
        var data = {};
        data["Del" + elementType.toUpperCase()] = id;
        $.ajax({
          type: "POST",
          url: "includes/process.php",
          data: data,
          dataType: "json",
          success: function (response) {
            if (response.status === "success") {
              const scrollPosition = $(window).scrollTop();
              location.reload();
              $(window).on("load", function () {
                $(window).scrollTop(scrollPosition);
              });
            } else {
              Swal.fire("Error", response.message, "error");
            }
          },
        });
      }
    });
  });
  function handleEditDeleteCF(elementType, id, successCallback) {
    var data = {};
    data[elementType] = id;
    $.ajax({
      type: "POST",
      url: "includes/get.php",
      data: data,
      dataType: "json",
      success: function (response) {
        if (elementType === "cfm") {
          $("#cfm-name").val(response.Name);
          $("#cfm-description").val(response.Description);
          $("#cfm-rank").val(response.Rank);
          $("#cfm-weight").val(response.Weight);
          $("#edit-cfm").val(response.id);
          $("#edit-cfm-modal").modal("toggle").modal("show");
        } else if (elementType === "cfs") {
          $("#cfm").val(response.CFMID);
          $("#cfs-name").val(response.Name);
          $("#cfs-description").val(response.Description);
          $("#cfs-rank").val(response.Rank);
          $("#cfs-weight").val(response.Weight);
          $("#edit-cfs").val(response.id);
          $("#edit-cfs-modal").modal("toggle").modal("show");
        }
      },
    });
  }
  $(".editswot-btn").click(function () {
    var id = $(this).data("editswot");
    handleEditDeleteSWOT("swot", id);
  });
  $(".delswot-btn").click(function () {
    var id = $(this).data("delswot");
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel",
    }).then((result) => {
      if (result.isConfirmed) {
        var data = {};
        data["DelSWOT"] = id;
        $.ajax({
          type: "POST",
          url: "includes/process.php",
          data: data,
          dataType: "json",
          success: function (response) {
            if (response.status === "success") {
              const scrollPosition = $(window).scrollTop();
              location.reload();
              $(window).on("load", function () {
                $(window).scrollTop(scrollPosition);
              });
            } else {
              Swal.fire("Error", response.message, "error");
            }
          },
        });
      }
    });
  });
  function handleEditDeleteSWOT(elementType, id) {
    var data = {};
    data[elementType] = id;
    $.ajax({
      type: "POST",
      url: "includes/get.php",
      data: data,
      dataType: "json",
      success: function (response) {
        $("#swot-category").val(response.Category);
        $("#swot-name").val(response.Name);
        $("#swot-description").val(response.Description);
        $("#edit-swot").val(response.id);
        $("#edit-swot-modal").modal("toggle").modal("show");
      },
    });
  }
  $(".editcfm-btn, .editcfs-btn").click(function () {
    var elementType = $(this).data("editcfm") ? "cfm" : "cfs";
    var id = $(this).data("editcfm") || $(this).data("editcfs");
    handleEditDeleteCF(elementType, id);
  });
  $(".delcfm-btn, .delcfs-btn").click(function () {
    var elementType = $(this).data("delcfm") ? "cfm" : "cfs";
    var id = $(this).data("delcfm") || $(this).data("delcfs");
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel",
    }).then((result) => {
      if (result.isConfirmed) {
        var data = {};
        data["Del" + elementType.toUpperCase()] = id;
        $.ajax({
          type: "POST",
          url: "includes/process.php",
          data: data,
          dataType: "json",
          success: function (response) {
            if (response.status === "success") {
              const scrollPosition = $(window).scrollTop();
              location.reload();
              $(window).on("load", function () {
                $(window).scrollTop(scrollPosition);
              });
            } else {
              Swal.fire("Error", response.message, "error");
            }
          },
        });
      }
    });
  });
  if ($(".sf-assessment").length) {
    $(".sf-assessment").submit(function (e) {
      e.preventDefault();
      const formData = $(this).serialize();
      $.ajax({
        type: "POST",
        url: "includes/process.php",
        data: formData,
        dataType: "json",
        success: function (response) {
          console.log("success");
          if (
            $('input[type="radio"]').length / 5 ===
            $('input[type="radio"]:checked').length
          ) {
            $("#nextButton").show();
          } else {
            $("#nextButton").hide();
          }
        },
        error: function () {
          console.log("failed");
          if (
            $('input[type="radio"]').length / 5 ===
            $('input[type="radio"]:checked').length
          ) {
            $("#nextButton").show();
          } else {
            $("#nextButton").hide();
          }
        },
      });
    });
  }
  $("#Email").on("change", function () {
    var email = $(this).val();
    $.ajax({
      type: "POST",
      url: "includes/get.php",
      data: { GetMSME: email },
      dataType: "json",
      success: function (response) {
        $("#FirstName").val(response.FirstName);
        $("#MiddleName").val(response.MiddleName);
        $("#LastName").val(response.LastName);
        $("#Phone").val(response.Phone);
        $("#Province").val(response.Province);
        $("#IndustryCluster").val(response.IndustryCluster);
        $("#BusinessName").val(response.BusinessName);
      },
      error: function (xhr, status, error) {
        console.error(xhr, status, error);
      },
    });
  });
  $(".add-swot").click(function () {
    var swotId = $(this).data("id");
    var msmeid = $(this).data("msmeid");
    var category = $(this).data("category");
    $.ajax({
      type: "POST",
      url: "includes/process.php",
      data: { SWOTID: swotId, MSMEID: msmeid, AddSWOTAssessment: "" },
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          console.log("SWOT added successfully.");
          console.log("SWOT delete successfully.");
          const scrollPosition = $(window).scrollTop();
          location.reload();
          $(window).on("load", function () {
            $(window).scrollTop(scrollPosition);
            console.log("#add" + category + "Modal");
          });
        } else {
          console.log("Error: " + response.message);
        }
      },
      error: function (error) {
        console.log("AJAX error: " + error.statusText);
      },
    });
  });

  $(".del-swot").click(function () {
    var swotId = $(this).data("id");
    var msmeid = $(this).data("msmeid");
    var category = $(this).data("category");
    $.ajax({
      type: "POST",
      url: "includes/process.php",
      data: { SWOTID: swotId, MSMEID: msmeid, DeleteSWOTAssessment: "" },
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          console.log("SWOT delete successfully.");
          const scrollPosition = $(window).scrollTop();
          location.reload();
          $(window).on("load", function () {
            $(window).scrollTop(scrollPosition);
          });
        } else {
          console.log("Error: " + response.message);
        }
      },
      error: function (error) {
        console.log("AJAX error: " + error.statusText);
      },
    });
  });

  $(".add-cf").click(function () {
    var msmeid = $(this).data("msmeid");
    var cfmid = $(this).data("cfmid");
    var cfsid = $(this).data("cfsid");
    $.ajax({
      type: "POST",
      url: "includes/process.php",
      data: {
        CFMID: cfmid,
        CFSID: cfsid,
        MSMEID: msmeid,
        AddCFAssessment: "",
      },
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          console.log("SWOT added successfully.");
        } else {
          console.log("Error: " + response.message);
        }
      },
      error: function (error) {
        console.log("AJAX error: " + error.statusText);
      },
    });
  });

  $(".del-cf").click(function () {
    var msmeid = $(this).data("msmeid");
    var cfmid = $(this).data("cfmid");
    var cfsid = $(this).data("cfsid");
    $.ajax({
      type: "POST",
      url: "includes/process.php",
      data: {
        CFMID: cfmid,
        CFSID: cfsid,
        MSMEID: msmeid,
        DeleteCFAssessment: "",
      },
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          console.log("SWOT delete successfully.");
        } else {
          console.log("Error: " + response.message);
        }
      },
      error: function (error) {
        console.log("AJAX error: " + error.statusText);
      },
    });
  });
  if (
    $('input[type="radio"]').length / 5 ===
    $('input[type="radio"]:checked').length
  ) {
    $("#nextButton").show();
  } else {
    $("#nextButton").hide();
  }
});
