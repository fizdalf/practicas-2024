package com.example.userstories


import  androidx.compose.foundation.layout.Arrangement
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Spacer
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.layout.width
import androidx.compose.foundation.text.ClickableText
import androidx.compose.material3.Button
import androidx.compose.material3.OutlinedTextField
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.runtime.getValue
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.runtime.setValue
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.text.AnnotatedString
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import androidx.navigation.NavController


@Composable
    fun RegisterScreen(navController: NavController) {

    var mail by remember { mutableStateOf("") }
    var usuario by remember { mutableStateOf("") }
    var contrasena by remember { mutableStateOf("") }

    Column(
        horizontalAlignment = Alignment.CenterHorizontally,
        modifier = Modifier.padding(top = 50.dp)
    ) {

        Text(text = "Sign Up", fontSize = 35.sp, fontWeight = FontWeight.Bold)
    }

    Column(
        verticalArrangement = Arrangement.Center,
        horizontalAlignment = Alignment.CenterHorizontally
    ) {

        Spacer(Modifier.padding(40.dp))

        OutlinedTextField(
            value = mail,
            onValueChange = { mail = it },
            singleLine = true,
            label = { Text("Email") },
            modifier = Modifier.width(250.dp)
        )
        Spacer(Modifier.padding(10.dp))

        OutlinedTextField(
            value = usuario,
            onValueChange = { usuario = it },
            singleLine = true,
            label = { Text("User") },
            modifier = Modifier.width(250.dp)
        )

        Spacer(Modifier.padding(10.dp))

        OutlinedTextField(
            value = contrasena,
            onValueChange = { contrasena = it },
            singleLine = true,
            label = { Text("Password") },
            modifier = Modifier.width(250.dp)
        )
        Column(verticalArrangement = Arrangement.Bottom,
            horizontalAlignment = Alignment.CenterHorizontally,
            modifier = Modifier.padding(bottom = 60.dp)) {

            ClickableText(text = AnnotatedString("Tienes Cuenta?"), onClick = {})
        }
        Spacer(Modifier.padding(20.dp))

        Button(onClick = { navController.navigate("Login") }) {
            Text(text = "Log In")
        }

    }
}
