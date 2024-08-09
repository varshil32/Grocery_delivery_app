import 'package:flutter/material.dart';
import 'package:grocery_app/delivery_person/dashboard1/dashboard_screen1.dart';
import 'package:grocery_app/screens/account/account_screen.dart';
import 'package:grocery_app/screens/account/change_pass/change_password_page.dart';
import 'package:grocery_app/screens/account/complaint.dart';
import 'package:grocery_app/screens/account/feedback.dart';
import 'package:grocery_app/screens/account/order_history/order_screen.dart';
import 'package:grocery_app/screens/address_form.dart';
import 'package:grocery_app/screens/dashboard/dashboard_screen.dart';
import 'package:grocery_app/screens/explore_screen.dart';
import 'package:grocery_app/screens/login.dart';
import 'package:grocery_app/screens/otp.dart';
import 'package:grocery_app/screens/signup.dart';
import 'package:grocery_app/screens/splash_screen.dart';
import 'package:grocery_app/screens/subcategory_explore.dart';
import 'package:grocery_app/styles/theme.dart';

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      theme: themeData,
      home: SplashScreen(),
      debugShowCheckedModeBanner: false,
    );
  }
}
