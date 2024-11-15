function adminAuth(event) {
    event.preventDefault();
    let adminAuthForm = $("#adminAuthForm")[0];
    let adminAuthFormData = new FormData(adminAuthForm);
    $.ajax({
        url: "admin-auth",
        processData: false,
        contentType: false,
        type: "POST",
        data: adminAuthFormData,
        success: function (adminAuthResponse) {
            if (
                adminAuthResponse.status == "Email or Username not registered"
            ) {
                iziToast.show({
                    messageColor: "#FFFFFF",
                    backgroundColor: "#dc3545",
                    message: adminAuthResponse.status,
                });
            }
            if (adminAuthResponse.status == "Password not match") {
                iziToast.show({
                    messageColor: "#FFFFFF",
                    backgroundColor: "#dc3545",
                    message: adminAuthResponse.status,
                });
            }
            if (adminAuthResponse.status == "Successfully Authenticated") {
                window.location.href = "dashboard";
                //const cred = new PasswordCredential({
                    //id: adminAuthResponse.email,
                    //password: adminAuthResponse.password,
                    //name: adminAuthResponse.email,
                    //iconURL: "",
                //});
                //console.log(cred)
                //navigator.credentials.store(cred).then(() => {
                    //window.location.href = "dashboard";
                //});
            }
        },
        error: function (adminAuthErrors) {
            console.log(adminAuthErrors);
        },
    });
}