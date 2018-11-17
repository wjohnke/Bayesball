package com.company;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

public class Main {

    public static void main(String[] args) {
	// write your code here
//        System.setProperty("webdriver.chrome.driver","C:\\Users\\44255\\OneDrive\\Documents\\GitHub\\BayesBall" +
//                "\\Selenium\\chromedriver_win32\\chromedriver.exe");
        System.setProperty("webdriver.chrome.driver","../Selenium/chromedriver_win32/chromedriver.exe");

        System.out.println("hello");
        WebDriver driver= new ChromeDriver();
        String baseURL ="http://localhost/public/";
        String loginURL = "http://ec2-52-6-86-207.compute-1.amazonaws.com/BayesBall/blog/public/login";
        driver.get(loginURL);
        driver.findElement(By.id("email")).sendKeys("harleysong@outlook.com");
        driver.findElement(By.id("password")).sendKeys("123456");
        driver.findElement(By.tagName("button")).click();

        driver.findElement(By.id("hero")).click();

    }
}
