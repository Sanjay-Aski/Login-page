// Get the button element for generating OTP
let get_otp = document.getElementById("OTPbtn");
let resend = 0; // Initialize a variable to track resend attempts
let input_id_user = document.getElementById("user"); // Get the input field for the user
let new_input_otp = document.createElement("input"); // Create a new input field for entering OTP
let all_btns = document.querySelector(".btns"); // Get the container for buttons
let new_reOTP_btn = document.createElement("button"); // Create a button for resending OTP
let new_verify_btn = document.createElement("button"); // Create a button for verifying OTP
let count = 0; // Initialize a counter for button clicks
let otp = 0; // Initialize the OTP variable

// Function to display the OTP in the input field
function put_otp() {
    let getit = document.getElementById("otp");
    getit.value = otp;
}

// Function to generate a random OTP
function create_OTP() {
    let multiplier = 1;
    while (otp < 100000) {
        otp += parseInt(Math.random() * multiplier);
        multiplier *= 10;
        if (otp > 999999) {
            otp = 0;
            multiplier = 1;
        }
    }
    console.log(otp); // Log the generated OTP (for debugging purposes)
    put_otp(); // Display the OTP in the input field
}

// Function to set up UI after getting OTP
function after_get_OTP() {
    new_verify_btn.setAttribute("class", "login");
    new_reOTP_btn.setAttribute("class", "login");
    new_verify_btn.setAttribute("id", "verify");
    new_reOTP_btn.setAttribute("id", "resend");
    new_input_otp.setAttribute("name", "input_otp");
    input_id_user.after(new_input_otp);
    count++;
    new_input_otp.placeholder = "Enter the OTP";
    new_input_otp.id = "Entered_OTP";
    new_verify_btn.innerText = "VERIFY";
    all_btns.innerHTML = "";
    all_btns.append(new_verify_btn);
    all_btns.append(new_reOTP_btn);
    new_reOTP_btn.innerText = "Resend new OTP";

    // Event listener for the "Resend" button
    resend = document.getElementById("resend");
    resend.addEventListener("click", (event) => {
        event.preventDefault();
        let multiplier = 1;
        otp = 0;
        while (otp < 100000) {
            otp += parseInt(Math.random() * multiplier);
            multiplier *= 10;
            if (otp > 999999) {
                otp = 0;
                multiplier = 1;
            }
        }
        console.log(otp); // Log the newly generated OTP (for debugging purposes)
        put_otp(); // Display the new OTP in the input field
    });
}

// Event listener for the "Get OTP" button
get_otp.addEventListener("click", () => {
    create_OTP();
    if (count === 0) {
        after_get_OTP();
    }
});
