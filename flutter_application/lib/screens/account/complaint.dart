import 'package:flutter/material.dart';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

class ComplaintPage extends StatefulWidget {
  @override
  _ComplaintPageState createState() => _ComplaintPageState();
}

class _ComplaintPageState extends State<ComplaintPage> {
  final TextEditingController _complaintController = TextEditingController();
  final _formKey = GlobalKey<FormState>();
  var data;
  Future loginMtd() async {
    //     body: {'phone': phone.text, 'password': password.text});

    if (_complaintController.text != null) {
      try {
        final response = await http.post(
            Uri.parse(
                'http://localhost/ty_project/admin_panel/apiviewcomplaint.php'),
            body: {
              "complaint": _complaintController.text,
            });

        var data = jsonDecode(response.body);
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
    } else {
      Fluttertoast.showToast(
          msg: "Submit Not Successfully",
          toastLength: Toast.LENGTH_LONG,
          backgroundColor: Colors.grey,
          fontSize: 25);
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
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
          'complaint',
          style: TextStyle(color: Colors.green),
        ),
      ),
      body: Center(
        child: Container(
          padding: EdgeInsets.all(20.0),
          decoration: BoxDecoration(
            color: Colors.white,
            borderRadius: BorderRadius.circular(10.0),
            boxShadow: [
              BoxShadow(
                color: Colors.grey.withOpacity(0.3),
                spreadRadius: 3,
                blurRadius: 5,
                offset: Offset(0, 3),
              ),
            ],
          ),
          child: Column(
            mainAxisSize: MainAxisSize.min,
            children: [
              Text(
                'Please provide your complaint below:',
                style: TextStyle(
                  fontSize: 20.0,
                  fontWeight: FontWeight.bold,
                  color: Colors.green,
                ),
              ),
              SizedBox(height: 20.0),
              Form(
                key: _formKey,
                child: TextFormField(
                  controller: _complaintController,
                  maxLines: 8,
                  validator: (value) {
                    if (value!.isEmpty) {
                      return 'Please provide your complaint';
                    }
                    return null;
                  },
                  decoration: InputDecoration(
                    border: OutlineInputBorder(
                      borderSide: BorderSide.none,
                    ),
                    filled: true,
                    fillColor: Colors.grey[200],
                    hintText: 'Type your complaint here...',
                  ),
                ),
              ),
              SizedBox(height: 20.0),
              ElevatedButton(
                onPressed: () {
                  if (_formKey.currentState!.validate()) {
                    // Submit complaint logic goes here
                    String complaint = _complaintController.text;
                    // Do something with the complaint
                    loginMtd();
                    Navigator.pop(context);
                  }
                },
                style: ButtonStyle(
                  backgroundColor:
                      MaterialStateProperty.all<Color>(Colors.green),
                ),
                child: Text('Submit'),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
