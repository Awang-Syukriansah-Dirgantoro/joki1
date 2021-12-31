import 'package:baru/view_models/globalVariables_viewModel.dart';
import 'package:flutter/material.dart';
// import 'package:provider/provider.dart';
// import 'package:baru/view_models/globalVariables_viewModel.dart';
import 'package:baru/views/home/home_screen.dart';
import 'package:baru/utils/theme.dart';
// import 'view_models/auth_viewModel.dart';
import 'package:baru/utils/routes.dart';
import 'package:provider/provider.dart';

main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MultiProvider(
      providers: [
        ChangeNotifierProvider(create: (context) => globalVars()),
      ],
      child: MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'E-Commerce',
      theme: theme(),
      home: HomeScreen(),
      routes: routes,
    ));
  }
}
