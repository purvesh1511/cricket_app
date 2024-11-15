function renderSendEmailForm(token) {
    $("#loginFormWrap").html('<span class="loader mx-auto"></span>');
    $.ajax({
        url: "render-send-email-form",
        type: "POST",
        data: {
            _token: token,
        },
        success: function (renderSendEmailFormResponse) {
            $("#loginFormWrap").html(renderSendEmailFormResponse);
        },
        error: function (renderSendEmailFormErrors) {
            console.log(renderSendEmailFormErrors);
        },
    });
}
function renderLoginForm(token) {
    $("#loginFormWrap").html('<span class="loader mx-auto"></span>');
    $.ajax({
        url: "render-login-form",
        type: "POST",
        data: {
            _token: token,
        },
        success: function (renderLoginFormResponse) {
            $("#loginFormWrap").html(renderLoginFormResponse);
        },
        error: function (renderLoginFormErrors) {
            console.log(renderLoginFormErrors);
        },
    });
}
function renderVerificationForm(token) {
    $.ajax({
        url: "render-verification-form",
        type: "POST",
        data: {
            _token: token,
        },
        success: function (renderVerificationFormResponse) {
            $("#loginFormWrap").html(renderVerificationFormResponse);
        },
        error: function (renderVerificationFormErrors) {
            console.log(renderVerificationFormErrors);
        },
    });
}
function sendVerificationMail(event, token) {
    event.preventDefault();
    let sendVerificationMailForm = $("#sendVerificationMailForm")[0];
    let sendVerificationMailFormData = new FormData(sendVerificationMailForm);
    sendVerificationMailFormData.append("_token", token);
    $("#loginFormWrap").html('<span class="loader mx-auto"></span>');
    $.ajax({
        url: "send-verification-mail",
        processData: false,
        contentType: false,
        type: "POST",
        data: sendVerificationMailFormData,
        success: function (sendVerificationMailResponse) {
            if (sendVerificationMailResponse.status == "Email Not Registered") {
                renderSendEmailForm(token);
                iziToast.show({
                    messageColor: "#FFFFFF",
                    backgroundColor: "#dc3545",
                    message: "Email Not Registered",
                });
            }
            if (sendVerificationMailResponse.status == 'Code Sent') {
                renderVerificationForm(token);
                iziToast.show({
                    messageColor: '#FFFFFF',
                    backgroundColor: '#28a745',
                    message: 'Verification Code Sent'
                });
            }
        },
        error: function (sendVerificationMailErrors) {
            console.log(sendVerificationMailErrors);
        },
    });
}
function renderResetPasswordForm(token) {
    $.ajax({
        url: "render-reset-password-form",
        type: "POST",
        data: {
            _token: token,
        },
        success: function (renderResetPasswordFormResponse) {
            $("#loginFormWrap").html(renderResetPasswordFormResponse);
        },
        error: function (renderResetPasswordFormErrors) {
            console.log(renderResetPasswordFormErrors);
        },
    });
}
function veriyEmail(event, token) {
    event.preventDefault();
    let veriyEmailForm = $("#verifyEmailForm")[0];
    let veriyEmailFormData = new FormData(veriyEmailForm);
    veriyEmailFormData.append("_token", token);
    $("#loginFormWrap").html('<span class="loader mx-auto"></span>');
    $.ajax({
        url: "verify-email",
        processData: false,
        contentType: false,
        type: "POST",
        data: veriyEmailFormData,
        success: function (veriyEmailResponse) {
            if (veriyEmailResponse.status == "Something went wrong") {
                renderVerificationForm(token);
                iziToast.show({
                    messageColor: "#FFFFFF",
                    backgroundColor: "#dc3545",
                    message: veriyEmailResponse.status,
                });
            }
            if (veriyEmailResponse.status == "Invalid Verification Code") {
                renderVerificationForm(token);
                iziToast.show({
                    messageColor: "#FFFFFF",
                    backgroundColor: "#dc3545",
                    message: veriyEmailResponse.status,
                });
            }
            if (veriyEmailResponse.status == 'Reset Password') {
                renderResetPasswordForm(token);
            }
        },
        error: function (veriyEmailErrors) {
            console.log(veriyEmailErrors);
        },
    });
}
function resetPassword(event, token) {
    event.preventDefault();
    let resetPasswordForm = $("#resetPasswordForm")[0];
    let resetPasswordFormData = new FormData(resetPasswordForm);
    resetPasswordFormData.append("_token", token);
    $("#loginFormWrap").html('<span class="loader mx-auto"></span>');
    $.ajax({
        url: "reset-password",
        processData: false,
        contentType: false,
        type: "POST",
        data: resetPasswordFormData,
        success: function (resetPasswordResponse) {
            if (resetPasswordResponse.status == "Something went wrong") {
                renderResetPasswordForm(token);
                iziToast.show({
                    messageColor: "#FFFFFF",
                    backgroundColor: "#dc3545",
                    message: resetPasswordResponse.status,
                });
            }
            if (resetPasswordResponse.status == "Password confirmation not match") {
                renderResetPasswordForm(token);
                iziToast.show({
                    messageColor: "#FFFFFF",
                    backgroundColor: "#dc3545",
                    message: resetPasswordResponse.status,
                });
            }
            if (resetPasswordResponse.status == 'Password Reset Successfully') {
                renderLoginForm(token);
                iziToast.show({
                    messageColor: '#FFFFFF',
                    backgroundColor: '#28a745',
                    message: resetPasswordResponse.status
                });
            }
        },
        error: function (resetPasswordErrors) {
            console.log(resetPasswordErrors);
        },
    });
}
