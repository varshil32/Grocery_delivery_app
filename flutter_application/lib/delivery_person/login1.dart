import 'package:flutter/material.dart';
import 'package:grocery_app/delivery_person/dashboard1/dashboard_screen1.dart';
import 'package:grocery_app/delivery_person/otp1.dart';
import 'package:grocery_app/delivery_person/signup1.dart';
import 'package:grocery_app/screens/dashboard/dashboard_screen.dart';
import 'package:grocery_app/screens/otp.dart';
import 'package:grocery_app/screens/signup.dart';
import 'dart:ui';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

class LoginScreen1 extends StatefulWidget {
  @override
  _LoginScreen1State createState() => _LoginScreen1State();
}

class _LoginScreen1State extends State<LoginScreen1> {
  var data;
  final _formKey = GlobalKey<FormState>();
  // late String _mobileNumber;
  // late String _password;
  TextEditingController phone = TextEditingController(text: '');

  TextEditingController password = TextEditingController(text: '');
  Future loginMtd() async {
    if (phone.text != null && password.text != null) {
      try {
        final response = await http.post(
            Uri.parse(
                'http://localhost/ty_project/admin_panel/delivery_person/apilogin1.php'),
            body: {"phone": phone.text, "password": password.text});

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

    if (data == "success") {
      Fluttertoast.showToast(
          msg: "Login Successfully",
          toastLength: Toast.LENGTH_LONG,
          backgroundColor: Colors.grey,
          fontSize: 25);
    } else {
      Fluttertoast.showToast(
          msg: "Login Not Successfully",
          toastLength: Toast.LENGTH_LONG,
          backgroundColor: Colors.grey,
          fontSize: 25);
    }
  }

  @override
  Widget build(BuildContext context) {
    final screenHeight = MediaQuery.of(context).size.height;

    return Scaffold(
      body: Stack(
        children: [
          Positioned.fill(
            child: Opacity(
              opacity: 1,
              child: Image(
                image: AssetImage('assets/images/login.jpg'),
                fit: BoxFit.cover,
              ),
            ),
          ),
          SafeArea(
            child: Padding(
              padding: EdgeInsets.all(16),
              child: Form(
                key: _formKey,
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.center,
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text(
                      'Welcome',
                      style: TextStyle(
                          fontSize: 32.0,
                          fontWeight: FontWeight.bold,
                          color: Colors.white),
                    ),
                    SizedBox(height: 16.0),
                    TextFormField(
                      controller: phone,
                      keyboardType: TextInputType.phone,
                      decoration: InputDecoration(
                        hintText: 'Mobile Number',
                        fillColor: Colors.white,
                        filled: true,
                      ),
                      validator: (value) {
                        if (value!.isEmpty) {
                          return 'Please enter mobile number';
                        }
                        return null;
                      },
                      onSaved: (value) {
                        phone = value! as TextEditingController;
                      },
                    ),
                    SizedBox(height: 16),
                    TextFormField(
                      controller: password,
                      // obscureText: true,
                      decoration: InputDecoration(
                        hintText: 'Password',
                        fillColor: Colors.white,
                        filled: true,
                      ),
                      validator: (value) {
                        if (value!.isEmpty) {
                          return 'Please enter password';
                        }
                        return null;
                      },
                      onSaved: (value) {
                        password = value! as TextEditingController;
                      },
                    ),
                    SizedBox(height: 16),
                    ElevatedButton(
                      style: ButtonStyle(
                        padding: MaterialStateProperty.all<EdgeInsets>(
                          EdgeInsets.all(20.0), // <-- Set padding values here
                        ),
                        backgroundColor: MaterialStateProperty.all<Color>(
                          Colors.white,
                        ),
                        foregroundColor: MaterialStateProperty.all<Color>(
                          Color(0xff53B175),
                        ),
                      ),
                      child: Text(
                        'Login',
                        style: TextStyle(fontSize: 20),
                      ),
                      onPressed: () {
                        // print(phone.text);
                        //print(password.text);
                        loginMtd();
                        // if (_formKey.currentState!.validate()) {
                        //   _formKey.currentState!.save();
                        //   // TODO: Implement login functionality
                        // }
                        Navigator.push(
                          context,
                          MaterialPageRoute(
                            builder: (context) => DashboardScreen1(),
                          ),
                        );
                      },
                    ),
                    SizedBox(
                      height: 16,
                    ),
                    TextButton(
                        onPressed: () {
                          Navigator.push(
                              context,
                              MaterialPageRoute(
                                builder: (context) => ConfirmOtpPage1(),
                              ));
                        },
                        child: Text(
                          'forgot password?',
                          style: TextStyle(
                            color: Colors.white,
                            fontStyle: FontStyle.italic,
                          ),
                        ))
                  ],
                ),
              ),
            ),
          ),
          Positioned(
            bottom: 0,
            left: 0,
            right: 0,
            child: Container(
              height: screenHeight * 0.08,
              alignment: Alignment.bottomCenter,
              child: GestureDetector(
                onTap: () {
                  Navigator.push(
                    context,
                    MaterialPageRoute(builder: (context) => SignupScreen1()),
                  );
                },
                child: Padding(
                  padding: const EdgeInsets.only(bottom: 10),
                  child: Container(
                    decoration: BoxDecoration(
                      boxShadow: [
                        BoxShadow(
                          color: Colors.black.withOpacity(0.2),
                          blurRadius: 2,
                          offset: Offset(0, 1),
                        ),
                      ],
                    ),
                    child: Text(
                      'Don\'t have an account? Sign up',
                      style: TextStyle(
                        fontSize: 16,
                        fontStyle: FontStyle.italic,
                        color: Color.fromARGB(255, 255, 255, 255),
                      ),
                    ),
                  ),
                ),
              ),
            ),
          ),
        ],
      ),
    );
  }
}
