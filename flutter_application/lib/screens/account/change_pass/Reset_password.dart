import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:grocery_app/screens/otp.dart';
import 'package:http/http.dart' as http;
import '../../dashboard/dashboard_screen.dart';

class ResetPasswordPage extends StatefulWidget {
  @override
  _ResetPasswordPageState createState() => _ResetPasswordPageState();
}

class _ResetPasswordPageState extends State<ResetPasswordPage> {
  final _formKey = GlobalKey<FormState>();
  var data;
  String _newPassword = "";
  String _confirmNewPassword = "";
  TextEditingController _newPasswordController = TextEditingController();
TextEditingController _confirmNewPasswordController = TextEditingController();

  Future loginMtd() async {
    if (_newPasswordController != null && _confirmNewPasswordController != null) {
      try {
        final response = await http.post(
            Uri.parse(
                'http://localhost/ty_project/admin_panel/apiresetpass.php'),
            body: {
              "newpass": _newPasswordController.text,
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
          builder: (context) => DashboardScreen(),
        ),
      );
    } else {
      Fluttertoast.showToast(
          msg: "Submit Not Successfully",
          toastLength: Toast.LENGTH_LONG,
          backgroundColor: Colors.grey,
          fontSize: 25);
           Navigator.of(context).pop();
      Navigator.push(
        context,
        MaterialPageRoute(
          builder: (context) => ResetPasswordPage(),
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
          'Reset Password',
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
                  obscureText: true,
                  controller: _newPasswordController,
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
                  obscureText: true,
                   controller: _confirmNewPasswordController,
                  decoration: InputDecoration(
                    labelText: "Confirm New Password",
                    border: OutlineInputBorder(),
                  ),
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return "Please confirm your new password";
                    }
                    if (value != _newPassword) {
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
                ElevatedButton(
                  onPressed: () {
                    if (_formKey.currentState!.validate()) {
                       _newPassword = _newPasswordController.text; // <-- get the value from the controller
                    _confirmNewPassword = _confirmNewPasswordController.text;
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
