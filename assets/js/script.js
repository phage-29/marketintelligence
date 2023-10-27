jQuery(document).ready(function () {
  if ($(".ajax-form").length) {
    jQuery(".ajax-form").submit(function (e) {
      e.preventDefault();

      const formData = jQuery(this).serialize();

      jQuery.ajax({
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
    jQuery("#MSME").submit(function (e) {
      e.preventDefault();

      const formData = jQuery(this).serialize();

      jQuery.ajax({
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
    jQuery("#SuccessFactor").submit(function (e) {
      e.preventDefault();

      const formData = jQuery(this).serialize();

      jQuery.ajax({
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

  if ($("#SWOT").length) {
    jQuery("#SWOT").submit(function (e) {
      e.preventDefault();

      const formData = jQuery(this).serialize();

      jQuery.ajax({
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
    jQuery("#CompetitorsFeature").submit(function (e) {
      e.preventDefault();

      const formData = jQuery(this).serialize();

      jQuery.ajax({
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
    jQuery("#AutoFill").submit(function (e) {
      e.preventDefault();

      const formData = jQuery(this).serialize();

      jQuery.ajax({
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

  // logout
  if ($("#Logout").length) {
    jQuery("#Logout").on("click", () => {
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
});
