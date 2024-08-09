import 'package:flutter/material.dart';
import 'package:grocery_app/screens/account/complaint.dart';
import 'package:grocery_app/screens/account/feedback.dart';
import 'package:grocery_app/screens/account/legal_about/about_us.dart';
import 'package:grocery_app/screens/account/legal_about/legal_about_page.dart';
import 'package:grocery_app/screens/account/order_history/order_screen.dart';
//import 'package:grocery_app/screens/account/order_history/order_screen.dart';

import 'change_pass/change_password_page.dart';
import 'legal_about/faq_page.dart';

class AccountItem {
  final String label;
  final String iconPath;
  final Widget page;

  AccountItem(this.label, this.iconPath, this.page);
}

List<AccountItem> accountItems = [
  AccountItem(
      "Orders", "assets/icons/account_icons/orders_icon.svg", OrderScreen()),
  // AccountItem(
  //     "My Details", "assets/icons/account_icons/details_icon.svg", FaqPage()),
  AccountItem("Delivery Access", "assets/icons/account_icons/delivery_icon.svg",
      FaqPage()),
  // AccountItem("Payment Methods", "assets/icons/account_icons/payment_icon.svg",
  //     FaqPage()),
  // AccountItem(
  //     "Promo Card", "assets/icons/account_icons/promo_icon.svg", FaqPage()),
  AccountItem("notification",
      "assets/icons/account_icons/notification_icon.svg", LegalAboutPage()),
  AccountItem("change password",
      "assets/icons/account_icons/key.svg", ChangePasswordPage()),
  AccountItem(
      "feedback", "assets/icons/account_icons/feedback.svg", FeedbackPage()),
  AccountItem(
      "complaint", "assets/icons/account_icons/complaint.svg", ComplaintPage()),
  AccountItem(
      "legal", "assets/icons/account_icons/legal.svg", LegalAboutPage()),
  AccountItem("Help", "assets/icons/account_icons/help_icon.svg", FaqPage()),
  AccountItem(
      "About", "assets/icons/account_icons/about_icon.svg", AboutPage()),
];
