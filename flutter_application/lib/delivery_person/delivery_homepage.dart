import 'package:flutter/material.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      theme: ThemeData(
        primaryColor: Colors.green,
        accentColor: Colors.greenAccent,
        scaffoldBackgroundColor: Colors.white,
        textTheme: TextTheme(
          headline6: TextStyle(
            fontSize: 24,
            fontWeight: FontWeight.bold,
          ),
          subtitle1: TextStyle(
            fontSize: 18,
          ),
          subtitle2: TextStyle(
            fontSize: 16,
          ),
        ),
      ),
      home: DeliveryDashboard(),
    );
  }
}

class DeliveryDashboard extends StatefulWidget {
  @override
  _DeliveryDashboardState createState() => _DeliveryDashboardState();
}

class _DeliveryDashboardState extends State<DeliveryDashboard> {
  List<Order> incomingOrders = [
    Order(
      id: 1,
      address: '123 Main St',
      products: [
        'Product A',
        'Product B',
        'Product C',
      ],
      itemCount: 6,
      totalAmount: 75.0,
    ),
    Order(
      id: 1,
      address: '123 Main St',
      products: [
        'Product A',
        'Product B',
        'Product C',
      ],
      itemCount: 6,
      totalAmount: 75.0,
    ),
    Order(
      id: 1,
      address: '123 Main St',
      products: [
        'Product A',
        'Product B',
        'Product C',
      ],
      itemCount: 6,
      totalAmount: 75.0,
    ),
    Order(
      id: 1,
      address: '123 Main St',
      products: [
        'Product A',
        'Product B',
        'Product C',
      ],
      itemCount: 6,
      totalAmount: 75.0,
    ),
  ];

  List<Order> acceptedOrders = [];

  List<Order> orderHistory = [];

  void _acceptDelivery(Order order) {
    setState(() {
      incomingOrders.remove(order);
      acceptedOrders.add(order);
    });
  }

  void _receivedPayment(Order order) {
    setState(() {
      acceptedOrders.remove(order);
      orderHistory.add(order);
    });
  }

  Widget buildOrderCard(Order order, Function onPressed, String buttonText) {
    return Card(
      margin: EdgeInsets.symmetric(vertical: 8, horizontal: 16),
      child: Padding(
        padding: const EdgeInsets.all(16),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Text('Order ${order.id}',
                style: Theme.of(context).textTheme.headline6),
            SizedBox(height: 8),
            Text('Address: ${order.address}',
                style: Theme.of(context).textTheme.subtitle1),
            Text('Products: ${order.products.join(', ')}',
                style: Theme.of(context).textTheme.subtitle2),
            Text('Item Count: ${order.itemCount}',
                style: Theme.of(context).textTheme.subtitle2),
            Text('Total Amount: \$${order.totalAmount}',
                style: Theme.of(context).textTheme.subtitle2),
            SizedBox(height: 16),
            Align(
              alignment: Alignment.centerRight,
              child: ElevatedButton(
                onPressed: () {
                  onPressed();
                },
                child: Text(buttonText),
              ),
            ),
          ],
        ),
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: PreferredSize(
        preferredSize: Size.fromHeight(kToolbarHeight),
        child: Stack(
          children: [
            AppBar(
              automaticallyImplyLeading: false,
              backgroundColor: Colors.transparent,
              elevation: 0.0,
              title: Text(
                'Delivery Dashboard',
                style: TextStyle(
                    fontSize: 20,
                    fontWeight: FontWeight.bold,
                    color: Colors.green),
              ),
              actions: [
                Stack(
                  children: [
                    IconButton(
                      icon: Padding(
                        padding: const EdgeInsets.only(top: 8.0),
                        child: Icon(
                          Icons.notifications,
                          color: Colors.green,
                        ),
                      ),
                      onPressed: () {
                        showDialog(
                          context: context,
                          builder: (BuildContext context) {
                            return AlertDialog(
                              title: Text('Incoming Orders'),
                              content: Container(
                                width: double.maxFinite,
                                child: ListView.builder(
                                  itemCount: incomingOrders.length,
                                  itemBuilder:
                                      (BuildContext context, int index) {
                                    return buildOrderCard(
                                      incomingOrders[index],
                                      () {
                                        _acceptDelivery(incomingOrders[index]);
                                        Navigator.of(context).pop();
                                      },
                                      'Accept Delivery',
                                    );
                                  },
                                ),
                              ),
                              actions: [
                                TextButton(
                                  child: Text('Close'),
                                  onPressed: () {
                                    Navigator.of(context).pop();
                                  },
                                ),
                              ],
                            );
                          },
                        );
                      },
                    ),
                    Positioned(
                      right: 4,
                      top: 9,
                      child: CircleAvatar(
                        radius: 8,
                        backgroundColor: Colors.red,
                        child: Text(
                          incomingOrders.length.toString(),
                          style: TextStyle(fontSize: 12, color: Colors.white),
                        ),
                      ),
                    ),
                  ],
                ),
                IconButton(
                  icon: Icon(
                    Icons.history,
                    color: Colors.green,
                  ),
                  onPressed: () {
                    Navigator.push(
                      context,
                      MaterialPageRoute(
                        builder: (context) =>
                            OrderHistoryPage(orderHistory: orderHistory),
                      ),
                    );
                  },
                ),
              ],
            ),
            Positioned(
              bottom: 0,
              left: 0,
              right: 0,
              child: Padding(
                padding: const EdgeInsets.symmetric(horizontal: 8.0),
                child: Divider(
                  thickness: 1,
                ),
              ),
            ),
          ],
        ),
      ),
      body: ListView.builder(
        itemCount: acceptedOrders.length,
        itemBuilder: (BuildContext context, int index) {
          return buildOrderCard(
            acceptedOrders[index],
            () {
              _receivedPayment(acceptedOrders[index]);
            },
            'Received Payment',
          );
        },
      ),
    );
  }
}

class OrderHistoryPage extends StatelessWidget {
  final List<Order> orderHistory;

  OrderHistoryPage({required this.orderHistory});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        leading: IconButton(
          icon: Icon(
            Icons.arrow_back,
            color: Colors.black,
          ),
          onPressed: () => {
            Navigator.pop(context),
          },
        ),
        backgroundColor: Colors.transparent,
        elevation: 0.0,
        title: Text(
          'Order History',
          style: TextStyle(color: Colors.green),
        ),
      ),
      body: ListView.builder(
        itemCount: orderHistory.length,
        itemBuilder: (BuildContext context, int index) {
          return ListTile(
            title: Text('Order ${orderHistory[index].id}'),
            subtitle: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Text('Address: ${orderHistory[index].address}'),
                Text('Products: ${orderHistory[index].products.join(', ')}'),
                Text('Item Count: ${orderHistory[index].itemCount}'),
                Text('Total Amount: \$${orderHistory[index].totalAmount}'),
                Divider(
                  thickness: 1,
                ),
              ],
            ),
          );
        },
      ),
    );
  }
}

class Order {
  final int id;
  final String address;
  final List<String> products;
  final int itemCount;
  final double totalAmount;

  Order({
    required this.id,
    required this.address,
    required this.products,
    required this.itemCount,
    required this.totalAmount,
  });
}
