import 'package:flutter/material.dart';
import 'package:grocery_app/delivery_person/account1/change_pass1/change_password_page1.dart';
import 'package:grocery_app/delivery_person/account1/complaint1.dart';
import 'package:grocery_app/delivery_person/account1/feedback1.dart';
import 'package:grocery_app/delivery_person/account1/legal_about1/about_us1.dart';
import 'package:grocery_app/delivery_person/account1/legal_about1/legal_about_page1.dart';
import 'package:grocery_app/screens/account/complaint.dart';
import 'package:grocery_app/screens/account/feedback.dart';
import 'package:grocery_app/screens/account/legal_about/about_us.dart';
import 'package:grocery_app/screens/account/legal_about/legal_about_page.dart';
import 'package:grocery_app/screens/account/order_history/order_screen.dart';

import 'legal_about1/faq_page1.dart';
//import 'package:grocery_app/screens/account/order_history/order_screen.dart';

class AccountItem {
  final String label;
  final String iconPath;
  final Widget page;

  AccountItem(this.label, this.iconPath, this.page);
}

List<AccountItem> accountItems = [
  // AccountItem(
  //     "Orders", "assets/icons/account_icons/orders_icon.svg", OrderScreen()),
  // AccountItem("Delivery Access", "assets/icons/account_icons/delivery_icon.svg",
  //     FaqPage1()),
  AccountItem("notification",
      "assets/icons/account_icons/notification_icon.svg", LegalAboutPage()),
  AccountItem("change password", "assets/icons/account_icons/key.svg",
      ChangePasswordPage1()),
  AccountItem(
      "feedback", "assets/icons/account_icons/feedback.svg", FeedbackPage1()),
  AccountItem("complaint", "assets/icons/account_icons/complaint.svg",
      ComplaintPage1()),
  AccountItem(
      "legal", "assets/icons/account_icons/legal.svg", LegalAboutPage1()),
  AccountItem("Help", "assets/icons/account_icons/help_icon.svg", FaqPage1()),
  AccountItem(
      "About", "assets/icons/account_icons/about_icon.svg", AboutPage1()),
];
