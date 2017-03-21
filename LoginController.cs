using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;

namespace webapi123.Controllers
{
    public class LoginController : ApiController
    {

        [HttpPost]
        public void CreateRecord(User u)
        {
            SqlConnection conn = new SqlConnection(@"Data Source=(LocalDB)\v11.0;AttachDbFilename=c:\users\user1\webapi123\webapi123\App_Data\db1.mdf;Integrated Security=True");
            SqlCommand cmd = new SqlCommand();
            cmd.CommandText = "INSERT INTO User (userid,password) VALUES (@value1,@value2)";
            cmd.Parameters.Add("@value1",u.userid);
            cmd.Parameters.Add("@value2", u.password);
            cmd.Connection = conn;
            conn.Open();
            cmd.ExecuteNonQuery();
            conn.Close();
        }
    }
}
