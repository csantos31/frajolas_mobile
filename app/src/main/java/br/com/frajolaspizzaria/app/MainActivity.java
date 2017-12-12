package br.com.frajolaspizzaria.app;

import android.content.Intent;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class MainActivity extends AppCompatActivity {

    ListView listView;
    ProdutoAdapter adapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);


        listView = (ListView) findViewById(R.id.lstMain);
        adapter = new ProdutoAdapter(this, new ArrayList<Produto>());
        listView.setAdapter(adapter);

        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {

            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int i, long l) {
                ProdutoStatic.pizza = adapter.getItem(i);
                startActivity(new Intent(MainActivity.this, ScrollingActivity.class));
            }
        });



        new AsyncTask<Void, Void, Void>() {
            @Override
            protected Void doInBackground(Void... voids) {
                String retornoJson = Http.get("http://10.0.2.2/pizzaria/cms/api/ap_frajola.php");
                Log.d("TAG", retornoJson);

                try {
                    JSONArray jsonArray = new JSONArray(retornoJson);

                    for (int i = 0; i < jsonArray.length(); i++) {
                        JSONObject item = jsonArray.getJSONObject(i);
                        adapter.add(Produto.create(item.getInt("idProduto"), item.getString("nome"), item.getString("fotoProduto"), item.getString("descricao"), 5f, item.getDouble("preco")));
                    }


                } catch (JSONException ex) {
                    Log.e("Erro", ex.getMessage());
                }

                return null;
            }
        }.execute();


    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            Intent intent = new Intent(this, ScrollingActivity.class);
            startActivity(intent);
        }

        return super.onOptionsItemSelected(item);
    }

    public void Ligar(View view) {

        conexao();

    }

    public static class ProdutoStatic{
        public static Produto pizza = new Produto();
    }

     public void conexao(){
            new AsyncTask<Void, Void, Void>() {

                String telefone;
                @Override
                protected Void doInBackground(Void... voids) {
                    String retornoJson = Http.get("http://10.0.2.2/pizzaria/cms/api/tel.php");
                    Log.d("TAG", retornoJson);

                    try {
                        JSONObject tel = new JSONObject(retornoJson);
                        telefone = tel.getString("telefone");
                    } catch (JSONException ex) {
                        Log.e("Erro", ex.getMessage());
                    }

                    return null;
                }

                @Override
                protected void onPostExecute(Void aVoid) {
                    super.onPostExecute(aVoid);


                    Intent intent = new Intent(Intent.ACTION_DIAL,
                            Uri.parse("tel:"+ telefone));
                    startActivity(intent);

                }



            }.execute();
        }

}
