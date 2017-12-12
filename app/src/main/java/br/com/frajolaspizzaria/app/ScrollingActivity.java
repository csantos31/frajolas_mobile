package br.com.frajolaspizzaria.app;

import android.app.ProgressDialog;
import android.content.Context;
import android.os.AsyncTask;
import android.os.Bundle;
import android.os.SystemClock;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.View;
import android.widget.ImageView;
import android.widget.RatingBar;
import android.widget.TextView;
import android.widget.Toast;

import com.squareup.picasso.Picasso;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;

import static java.lang.Float.parseFloat;
import static java.lang.Float.valueOf;

public class ScrollingActivity extends AppCompatActivity {

    ImageView img;
    TextView nome, desc, preco;
    RatingBar ratingBar;
    Float valor;
    int id;

    Context ctx;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_scrolling);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        ctx = this;

        img = (ImageView)findViewById(R.id.imgPizzaDetalhe);
        nome = (TextView)findViewById(R.id.txtNomeDetalhe);
        desc = (TextView)findViewById(R.id.txtDescricaoDetalhe);
        preco = (TextView)findViewById(R.id.txtValorDetalhe);
        ratingBar = (RatingBar)findViewById(R.id.ratingBar);


        nome.setText(MainActivity.ProdutoStatic.pizza.getNome());
        desc.setText(MainActivity.ProdutoStatic.pizza.getDescricao());
        preco.setText(MainActivity.ProdutoStatic.pizza.getValor().toString());
        id =  MainActivity.ProdutoStatic.pizza.getId();

        String link = "http://10.0.2.2/pizzaria/cms/" + MainActivity.ProdutoStatic.pizza.getImagem();
        Log.d("link", link);

        Picasso.with(ScrollingActivity.this)
                .load( link )
                .into(img);


        ratingBar.setOnRatingBarChangeListener(new RatingBar.OnRatingBarChangeListener() {
            @Override
            public void onRatingChanged(RatingBar ratingBar, float rating, boolean fromUser) {
                valor = valueOf(rating);
            }
        });

    }


    public void inserirAvaliacao(View view) {
        final String url = "http://10.0.2.2/pizzaria/cms/api/classificacao.php";

        final HashMap<String, String> valores = new HashMap<>();
        valores.put("valor", valueOf(valor).toString());
        valores.put("id", valueOf(id).toString());


        new AsyncTask<Void, Void, Void>(){

            Boolean sucesso = false;
            String mensagem = "";
            ProgressDialog progress;



            @Override
            protected Void doInBackground(Void... voids) {
                String resultado = Http.post(url, valores);

                //CONVERSÃO PARA JSON
                try {
                    JSONObject jsonObject = new JSONObject(resultado);
                    sucesso = jsonObject.getBoolean("sucesso");
                    mensagem = jsonObject.getString("mensagem");
                } catch (JSONException e) {
                    e.printStackTrace();
                    sucesso = false;
                    mensagem = "Erro ao inserir";
                }
                return null;
            }
        }.execute();
        Toast.makeText(ctx, "Avaliação = " + valor, Toast.LENGTH_SHORT).show();
    }
}
