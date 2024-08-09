import 'package:flutter/material.dart';
import 'package:grocery_app/delivery_person/account1/change_pass1/Reset_password1.dart';
import 'package:grocery_app/delivery_person/dashboard1/dashboard_screen1.dart';
import 'package:grocery_app/screens/account/change_pass/Reset_password.dart';
import 'package:grocery_app/screens/dashboard/dashboard_screen.dart';
import 'package:grocery_app/screens/otp.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';
import 'package:fluttertoast/fluttertoast.dart';

class ChangePasswordPage1 extends StatefulWidget {
  @override
  _ChangePasswordPage1State createState() => _ChangePasswordPage1State();
}

class _ChangePasswordPage1State extends State<ChangePasswordPage1> {
  final _formKey = GlobalKey<FormState>();
  String _currentPassword = "";
  String _newPassword = "";
  String _confirmNewPassword = "";
  var data;
  TextEditingController _currentPasswordController = TextEditingController();
  TextEditingController _newPasswordController = TextEditingController();
  TextEditingController _confirmNewPasswordController = TextEditingController();

  Future loginMtd() async {
    if (_newPasswordController != null &&
        _confirmNewPasswordController != null &&
        _currentPasswordController != null) {
      try {
        final response = await http.post(
            Uri.parse(
                'http://localhost/ty_project/admin_panel/delivery_person/apichangepass1.php'),
            body: {
              "newpass": _newPasswordController.text,
              "oldpass": _currentPasswordController.text,
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
          builder: (context) => DashboardScreen1(),
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
          builder: (context) => ChangePasswordPage1(),
        ),
      );
      //checker = false;
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Colors.transparent,
        elevation: 0.0,
        leading: IconButton(
          icon: Icon(Icons.arrow_back, color: Colors.black),
          onPressed: () {
            Navigator.pop(context);
          },
        ),
        title: Text(
          'Change Password',
          style: TextStyle(color: Colors.green),
        ),
      ),
      body: SingleChildScrollView(
        child: Container(
          padding: EdgeInsets.all(16.0),
          child: Form(
            key: _formKey,
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                SizedBox(height: 16.0),
                TextFormField(
                  controller: _currentPasswordController,
                  obscureText: true,
                  decoration: InputDecoration(
                    labelText: "Enter Existing Password",
                    border: OutlineInputBorder(),
                  ),
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return "Please enter your current password";
                    }
                    // Add your password validation logic here
                    return null;
                  },
                  onChanged: (value) {
                    setState(() {
                      _currentPassword = value;
                    });
                  },
                ),
                SizedBox(height: 16.0),
                TextFormField(
                  controller: _newPasswordController,
                  obscureText: true,
                  decoration: InputDecoration(
                    labelText: "New Password",
                    border: OutlineInputBorder(),
                  ),
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return "Please enter a new password";
                    }
                    // Add your password validation logic here
                    return null;
                  },
                  onChanged: (value) {
                    setState(() {
                      _newPassword = value;
                    });
                  },
                ),
                SizedBox(height: 16.0),
                TextFormField(
                  controller: _confirmNewPasswordController,
                  obscureText: true,
                  decoration: InputDecoration(
                    labelText: "Confirm New Password",
                    border: OutlineInputBorder(),
                  ),
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return "Please confirm your new password";
                    }
                    if (value != _newPasswordController.text) {
                      return "Passwords do not match";
                    }
                    return null;
                  },
                  onChanged: (value) {
                    setState(() {
                      _confirmNewPassword = value;
                    });
                  },
                ),
                SizedBox(height: 32.0),
                InkWell(
                  onTap: () {
                    // Add your forgot password logic here
                    Navigator.push(
                        context,
                        MaterialPageRoute(
                          builder: (context) => ResetPasswordPage1(),
                        ));
                  },
                  child: Text(
                    "Forgot Password?",
                    style: TextStyle(
                      color: Colors.green,
                      fontWeight: FontWeight.bold,
                    ),
                  ),
                ),
                SizedBox(height: 32.0),
                ElevatedButton(
                  onPressed: () {
                    if (_formKey.currentState!.validate()) {
                      // Add your password update logic here
                       loginMtd();
                     
                    }
                  },
                  child: Text("Save Changes"),
                  style: ButtonStyle(
                    backgroundColor: MaterialStateProperty.all(Colors.green),
                    foregroundColor: MaterialStateProperty.all(Colors.white),
                  ),
                ),
              ],
            ),
          ),
        ),
      ),
    );
  }
}
