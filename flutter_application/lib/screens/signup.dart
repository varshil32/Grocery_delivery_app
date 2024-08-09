import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:grocery_app/screens/otp.dart';
import 'package:grocery_app/styles/colors.dart';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';
import 'package:flutter_form_builder/flutter_form_builder.dart';
import 'package:email_validator/email_validator.dart';

var data;

class SignupScreen extends StatefulWidget {
  @override
  State<SignupScreen> createState() => _SignupScreenState();
}

class _SignupScreenState extends State<SignupScreen> {
  bool checker = false;
  bool _isPasswordVisible = false;
  String? emailError;
  final _formKey = GlobalKey<FormState>();
  TextEditingController firstname = TextEditingController(text: '');
  TextEditingController lastname = TextEditingController(text: '');
  TextEditingController mobile = TextEditingController(text: '');
  TextEditingController address = TextEditingController(text: '');

  TextEditingController password = TextEditingController(text: '');
  TextEditingController email = TextEditingController(text: '');
  Future loginMtd() async {
    if (firstname.text != null &&
        lastname.text != null &&
        mobile.text != null &&
        address.text != null &&
        password.text != null &&
        email.text != null) {
      try {
        final response = await http.post(
            Uri.parse('http://localhost/ty_project/admin_panel/apisignup.php'),
            body: {
              "firstname": firstname.text,
              "lastname": lastname.text,
              "mobile": mobile.text,
              "address": address.text,
              "password": password.text,
              "email": email.text,
            });
        print(response.body);
        if (response.statusCode == 200 && response.body.isNotEmpty) {
          data = jsonDecode(response.body);
          // process the response data
        } else {
          // handle the error

          print('Error: response body is empty');
        }

        print("Response from server: $data");
      } catch (e) {
        print(e.toString());
      }
    }
    if (data == "Success") {
      Fluttertoast.showToast(
          msg: "Submit Successfully",
          toastLength: Toast.LENGTH_LONG,
          backgroundColor: Colors.grey,
          fontSize: 25);
      Navigator.push(
        context,
        MaterialPageRoute(
          builder: (context) => ConfirmOtpPage(),
        ),
      );
    } else {
      Fluttertoast.showToast(
          msg: "Submit Not Successfully",
          toastLength: Toast.LENGTH_LONG,
          backgroundColor: Colors.grey,
          fontSize: 25);
      Navigator.push(
        context,
        MaterialPageRoute(
          builder: (context) => SignupScreen(),
        ),
      );
      //checker = false;
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      resizeToAvoidBottomInset: false,
      body: SingleChildScrollView(
        child: Stack(
          children: [
            Positioned.fill(
              child: Image.asset(
                'assets/images/login.jpg',
                fit: BoxFit.cover,
                color: Color.fromARGB(255, 255, 255, 255).withOpacity(0.2),
                colorBlendMode: BlendMode.darken,
              ),
            ),
            AppBar(
              backgroundColor: Colors.transparent,
              elevation: 0.0,
              leading: IconButton(
                icon: Icon(
                  Icons.arrow_back,
                  color: Colors.white,
                ),
                onPressed: () => Navigator.of(context).pop(),
              ),
            ),
            Padding(
              padding:
                  EdgeInsets.only(top: 50, bottom: 16, left: 16, right: 16),
              child: Form(
                key: _formKey,
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: <Widget>[
                    SizedBox(height: kToolbarHeight),
                    Text(
                      'Sign Up',
                      style: TextStyle(
                          fontSize: 32.0,
                          fontWeight: FontWeight.bold,
                          color: Colors.white),
                    ),
                    SizedBox(height: 16.0),
                    Text(
                      'First Name',
                      style: TextStyle(
                          fontSize: 16.0,
                          fontWeight: FontWeight.bold,
                          color: Colors.white),
                    ),
                    TextFormField(
                      controller: firstname,
                      decoration: InputDecoration(
                        hintText: 'Enter your first name',
                        fillColor: Colors.white,
                        filled: true,
                      ),
                      validator: (value) {
                        if (value!.isEmpty) {
                          return 'Please enter your first name';
                        }
                        return null;
                      },
                    ),
                    SizedBox(height: 16.0),
                    Text(
                      'Last Name',
                      style: TextStyle(
                          fontSize: 16.0,
                          fontWeight: FontWeight.bold,
                          color: Colors.white),
                    ),
                    TextFormField(
                      controller: lastname,
                      decoration: InputDecoration(
                        hintText: 'Enter your last name',
                        fillColor: Colors.white,
                        filled: true,
                      ),
                      validator: (value) {
                        if (value!.isEmpty) {
                          return 'Please enter your last name';
                        }
                        return null;
                      },
                    ),
                    SizedBox(height: 16.0),
                    Text(
                      'Mobile Number',
                      style: TextStyle(
                          fontSize: 16.0,
                          fontWeight: FontWeight.bold,
                          color: Colors.white),
                    ),
                    TextField(
                      controller: mobile,
                      keyboardType: TextInputType.number,
                      inputFormatters: <TextInputFormatter>[
                        FilteringTextInputFormatter.allow(RegExp(r'[0-9]')),
                      ],
                      decoration: InputDecoration(
                        hintText: 'Enter your mobile number',
                        fillColor: Colors.white,
                        filled: true,
                      ),
                    ),
                    SizedBox(height: 16.0),
                    Text(
                      'Address',
                      style: TextStyle(
                          fontSize: 16.0,
                          fontWeight: FontWeight.bold,
                          color: Colors.white),
                    ),
                    TextFormField(
                      controller: address,
                      decoration: InputDecoration(
                        hintText: 'Enter your address',
                        fillColor: Colors.white,
                        filled: true,
                      ),
                      validator: (value) {
                        if (value!.isEmpty) {
                          return 'Please enter your address';
                        }
                        return null;
                      },
                    ),
                    SizedBox(height: 16.0),
                    Text(
                      'Email',
                      style: TextStyle(
                          fontSize: 16.0,
                          fontWeight: FontWeight.bold,
                          color: Colors.white),
                    ),
                    TextFormField(
                      controller: email,
                      keyboardType: TextInputType.emailAddress,
                      decoration: InputDecoration(
                        hintText: 'Enter your email',
                        fillColor: Colors.white,
                        filled: true,
                        errorText: emailError,
                        enabledBorder: OutlineInputBorder(
                          borderSide: BorderSide(
                            color:
                                emailError == null ? Colors.grey : Colors.red,
                          ),
                        ),
                        focusedBorder: OutlineInputBorder(
                          borderSide: BorderSide(
                            color:
                                emailError == null ? Colors.blue : Colors.red,
                          ),
                        ),
                      ),
                      onChanged: (value) {
                        if (value.isNotEmpty) {
                          if (!EmailValidator.validate(value)) {
                            setState(() {
                              emailError = 'Please enter a valid email address';
                            });
                          } else {
                            setState(() {
                              emailError = null;
                            });
                          }
                        }
                      },
                      validator: (value) {
                        if (value!.isEmpty) {
                          return 'Please enter your email address';
                        } else if (emailError != null) {
                          return emailError!;
                        }
                        return null;
                      },
                    ),
                    SizedBox(height: 16.0),
                    Text(
                      'Password',
                      style: TextStyle(
                          fontSize: 16.0,
                          fontWeight: FontWeight.bold,
                          color: Colors.white),
                    ),
                    TextFormField(
                      controller: password,
                      obscureText: !_isPasswordVisible,
                      decoration: InputDecoration(
                        hintText: 'Enter your password',
                        fillColor: Colors.white,
                        filled: true,
                        suffixIcon: IconButton(
                          icon: Icon(
                            _isPasswordVisible
                                ? Icons.visibility
                                : Icons.visibility_off,
                            color: Colors.grey,
                          ),
                          onPressed: () {
                            setState(() {
                              _isPasswordVisible = !_isPasswordVisible;
                            });
                          },
                        ),
                      ),
                      validator: (value) {
                        if (value!.isEmpty) {
                          return 'Password cannot be empty';
                        }
                        return null;
                      },
                    ),
                    SizedBox(height: 32.0),
                    ElevatedButton(
                      onPressed: () {
                        if (firstname.text.isEmpty) {
                          // Show an error message if the first name field is empty
                          ScaffoldMessenger.of(context).showSnackBar(
                            SnackBar(
                                content: Text('Please enter your first name')),
                          );
                        } else if (lastname.text.isEmpty) {
                          // Show an error message if the last name field is empty
                          ScaffoldMessenger.of(context).showSnackBar(
                            SnackBar(
                                content: Text('Please enter your last name')),
                          );
                        } else if (mobile.text.isEmpty) {
                          // Show an error message if the mobile number field is empty
                          ScaffoldMessenger.of(context).showSnackBar(
                            SnackBar(
                                content:
                                    Text('Please enter your mobile number')),
                          );
                        } else if (address.text.isEmpty) {
                          // Show an error message if the address field is empty
                          ScaffoldMessenger.of(context).showSnackBar(
                            SnackBar(
                                content: Text('Please enter your address')),
                          );
                        } else if (email.text.isEmpty) {
                          // Show an error message if the email field is empty
                          ScaffoldMessenger.of(context).showSnackBar(
                            SnackBar(content: Text('Please enter your email')),
                          );
                        } else if (password.text.isEmpty) {
                          // Show an error message if the password field is empty
                          ScaffoldMessenger.of(context).showSnackBar(
                            SnackBar(
                                content: Text('Please enter your password')),
                          );
                        } else {
                          // All fields are filled, proceed to sign up
                          loginMtd();
                        }
                      },
                      child: Padding(
                        padding: EdgeInsets.symmetric(vertical: 16.0),
                        child: Text(
                          'Sign Up',
                          style: TextStyle(
                            fontSize: 16.0,
                            fontWeight: FontWeight.bold,
                          ),
                        ),
                      ),
                      style: ButtonStyle(
                        backgroundColor: MaterialStateProperty.all<Color>(
                            AppColors.primaryColor),
                        foregroundColor:
                            MaterialStateProperty.all<Color>(Colors.white),
                        padding: MaterialStateProperty.all<EdgeInsetsGeometry>(
                          EdgeInsets.only(
                              top: 2, bottom: 2, left: 18, right: 18),
                        ),
                      ),
                    ),
                  ],
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
