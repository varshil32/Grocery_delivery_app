import 'dart:io';

import 'app_properties1.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';

class PrivacyPage extends StatefulWidget {
  @override
  _PrivacyPageState createState() => _PrivacyPageState();
}

class _PrivacyPageState extends State<PrivacyPage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      appBar: AppBar(
        iconTheme: IconThemeData(
          color: Colors.black,
        ),
        brightness: Brightness.light,
        backgroundColor: Colors.transparent,
        // title: Text(
        //   'Settings',
        //   style: TextStyle(color: darkGrey),
        // ),
        elevation: 0,
      ),
      body: SafeArea(
        bottom: true,
        child: Padding(
          padding: const EdgeInsets.only(top: 24.0, left: 24.0, right: 24.0),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: <Widget>[
              Padding(
                padding: const EdgeInsets.only(bottom: 16.0),
                child: Text(
                  'Privacy Policy',
                  style: TextStyle(
                      color: Colors.black,
                      fontWeight: FontWeight.bold,
                      fontSize: 25.0),
                ),
              ),
              Flexible(
                  child: Padding(
                    padding: const EdgeInsets.all(15.0),
                    child: ListView(
                children: [
                    Text(
                      "1. Collection of Personal Information:\nWe may collect personal information that you provide to us, such as your name, address, email address, and phone number. We may also collect information about your use of the Famiecare Grocery Mobile Application, such as the types of products you view and purchase",
                      style: TextStyle(fontSize: 15.0),
                    ),
                    SizedBox(
                      height: 20,
                    ),
                    Text(
                      "2. Use of Personal Information:\nWe use your personal information to provide you with the best possible service when you use the Famiecare Grocery Mobile Application. This includes processing your orders, sending you updates and notifications about your orders, and communicating with you regarding any customer service inquiries.",
                      style: TextStyle(fontSize: 15.0),
                    ),
                    SizedBox(
                      height: 20,
                    ),
                    Text(
                      "3. Sharing of Personal Information:\nWe do not share your personal information with any third parties, except as required by law or as necessary to provide the services you have requested.",
                      style: TextStyle(fontSize: 15.0),
                    ),
                    SizedBox(
                      height: 20,
                    ),
                    Text(
                        "4. Security of Personal Information:\nWe take reasonable steps to protect your personal information from unauthorized access, use, or disclosure. We use industry-standard encryption technologies and maintain physical, electronic, and procedural safeguards to protect your personal information.",
                        style: TextStyle(fontSize: 15.0)),
                    SizedBox(height: 20,),
                    Text(
                        "5. Cookies and Other Technologies:\nWe may use cookies, web beacons, and other technologies to collect information about your use of the Famiecare Grocery Mobile Application. This information may include your IP address, browser type, and operating system. We use this information to improve the functionality of the application and to better understand how users interact with it.",
                        style: TextStyle(fontSize: 15.0)),
                    SizedBox(height: 20,),
                    Text(
                        "6. Contact Information:\nIf you have any questions or comments about these Terms and Conditions, please contact us at support@famiecare.com.",
                        style: TextStyle(fontSize: 15.0)),
                ],
              ),
                  )),
            ],
          ),
        ),
      ),
    );
  }
}
