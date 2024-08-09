import 'dart:io';

//import 'package:lib\screens\account\legal_about\app_properties.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';

import 'app_properties.dart';

class AboutPage extends StatefulWidget {
  @override
  _AboutPageState createState() => _AboutPageState();
}

class _AboutPageState extends State<AboutPage> {
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
        title: Text(
          'Settings',
          style: TextStyle(color: darkGrey),
        ),
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
                  'About Us',
                  style: TextStyle(
                      color: Colors.black,
                      fontWeight: FontWeight.bold,
                      fontSize: 25.0),
                ),
              ),
              Flexible(
                  child: ListView(
                children: [
                  Text(
                    "Famiecare is an online grocery application that is committed to providing high-quality, fresh and nutritious food to our customers. We believe that everyone deserves access to healthy food, and we strive to make this a reality for everyone, regardless of their location or circumstances.",
                    style: TextStyle(fontSize: 15.0),
                  ),
                  SizedBox(
                    height: 20,
                  ),
                  Text(
                    "Our mission is to make grocery shopping easy and convenient for our customers, while providing them with the best possible experience. Our platform is designed to make it easy for customers to find the products they need, place an order, and have it delivered directly to their doorsteps.",
                    style: TextStyle(fontSize: 15.0),
                  ),
                  SizedBox(
                    height: 20,
                  ),
                  Text(
                    "At famiecare, we work with local farmers and producers to source the freshest and most nutritious food possible. We believe in supporting local communities and promoting sustainable farming practices, which is why we partner with local suppliers whenever possible.",
                    style: TextStyle(fontSize: 15.0),
                  ),
                  SizedBox(
                    height: 20,
                  ),
                  Text(
                      "Our team is dedicated to providing excellent customer service and support. We are always available to answer any questions or concerns you may have, and we strive to make your experience with us as seamless and enjoyable as possible.",
                      style: TextStyle(fontSize: 15.0)),
                  SizedBox(
                    height: 20,
                  ),
                  Text(
                      "Thank you for choosing famiecare as your trusted online grocery provider. We look forward to serving you and your family with the highest quality food and service.",
                      style: TextStyle(fontSize: 15.0)),
                  SizedBox(
                    height: 20,
                  ),
                ],
              )),
            ],
          ),
        ),
      ),
    );
  }
}
