import 'dart:io';

import 'app_properties1.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';

class ReturnPage extends StatefulWidget {
  @override
  _ReturnPageState createState() => _ReturnPageState();
}

class _ReturnPageState extends State<ReturnPage> {
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
                  'Return Policy',
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
                      "1. Return Eligibility for Dairy Products:\nWe do not accept returns for dairy products such as milk, cheese, and yogurt due to their perishable nature, unless the product is damaged, defective, or not as described. If you receive a damaged, defective, or incorrect dairy product, please contact us immediately.",
                      style: TextStyle(fontSize: 15.0),
                    ),
                    SizedBox(
                      height: 20,
                    ),
                    Text(
                      "2. Exchange Eligibility for Dairy Products:\nWe accept exchanges for dairy products that are damaged, defective, or not as described. If you receive a damaged, defective, or incorrect dairy product, please contact us immediately..",
                      style: TextStyle(fontSize: 15.0),
                    ),
                    SizedBox(
                      height: 20,
                    ),
                    Text(
                      "3. Refund Eligibility for Dairy Products:\nRefunds may be issued for damaged, defective, or incorrect dairy products. If you are eligible for a refund, we will process the refund within 7 days of receiving the returned item.",
                      style: TextStyle(fontSize: 15.0),
                    ),
                    SizedBox(
                      height: 20,
                    ),
                    Text(
                        "4. Return Eligibility for Grocery Items:\nWe accept returns for grocery items that are damaged, defective, or not as described. If you receive a damaged, defective, or incorrect grocery item, please contact us within 7 days of receipt of the item.",
                        style: TextStyle(fontSize: 15.0)),
                    SizedBox(height: 20,),
                    Text(
                        "5. Exchange Eligibility for Grocery Items:\nWe accept exchanges for grocery items that are damaged, defective, or not as described. If you receive a damaged, defective, or incorrect grocery item, please contact us within 7 days of receipt of the item",
                        style: TextStyle(fontSize: 15.0)),
                    SizedBox(height: 20,),
                    Text(
                        "6. Refund Eligibility for Grocery Items:\nRefunds may be issued for damaged, defective, or incorrect grocery items. If you are eligible for a refund, we will process the refund within 7 days of receiving the returned item.",
                        style: TextStyle(fontSize: 15.0)),
                        SizedBox(height: 20,),
                    Text(
                        "7. Return Process:\nTo initiate a return or exchange, please contact us at support@famiecare.com within 7 days of receipt of the item. We will provide you with instructions for returning the item, as well as a shipping label if necessary. Please note that return shipping costs are the responsibility of the customer, unless the item was damaged, defective, or incorrect..",
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
