package com.example.userstories.MAIN

import androidx.compose.runtime.Composable
import androidx.navigation.compose.NavHost
import androidx.navigation.compose.composable
import androidx.navigation.compose.rememberNavController
import com.example.userstories.LoginScreen
import com.example.userstories.RegisterScreen

@Composable
fun MyApp() {
    val navController = rememberNavController()
    NavHost(navController = navController, startDestination = "Login", ) {

        composable("Login") {
            LoginScreen(navController)
        }

        composable("Register") {
            RegisterScreen(navController)
        }
    }
}