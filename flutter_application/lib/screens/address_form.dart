import 'package:flutter/material.dart';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

class AddressPage extends StatefulWidget {
  @override
  _AddressPageState createState() => _AddressPageState();
}

class _AddressPageState extends State<AddressPage> {
  var data;
  final TextEditingController _addressController = TextEditingController();
  final _formKey = GlobalKey<FormState>();

  Future loginMtd() async {
    //     body: {'phone': phone.text, 'password': password.text});

    if (_addressController.text != "") {
      try {
        final response = await http.post(
            Uri.parse('http://localhost/ty_project/admin_panel/apiaddress.php'),
            body: {
              "address": _addressController.text,
            });

        data = jsonDecode(response.body);

        print("Response from server:" + data);
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
          msg: "Not Successfully",
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
          'address',
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
                'Please provide your address below:',
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
                  controller: _addressController,
                  maxLines: 8,
                  validator: (value) {
                    if (value!.isEmpty) {
                      return 'Please provide your address';
                    }
                    return null;
                  },
                  decoration: InputDecoration(
                    border: OutlineInputBorder(
                      borderSide: BorderSide.none,
                    ),
                    filled: true,
                    fillColor: Colors.grey[200],
                    hintText: 'Type your address here...',
                  ),
                ),
              ),
              SizedBox(height: 20.0),
              ElevatedButton(
                onPressed: () {
                  if (_formKey.currentState!.validate()) {
                    // Submit address logic goes here
                    // Do something with the address
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
