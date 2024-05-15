import sys
import time
import json
import warnings
from transformers import pipeline

# Suppress specific warnings
warnings.filterwarnings("ignore", message="Some weights of the model checkpoint")
warnings.filterwarnings("ignore", message="`resume_download` is deprecated")

sentiment_nlp = pipeline("sentiment-analysis", model="distilbert-base-uncased-finetuned-sst-2-english")

def analyze_sentiment(text):
    try:
        start_time = time.time()
        sentiment_result = sentiment_nlp(text)[0]
        end_time = time.time()
        
        result = {
            "text": text,
            "sentiment": sentiment_result["label"],
            "sentiment_score": float(sentiment_result["score"]),
            "processing_time": f"{end_time - start_time:.2f}s",
            "word_count": len(text.split()),
            "char_count": len(text)
        }
        
        return json.dumps(result)
    except Exception as e:
        return json.dumps({"error": str(e)})

if __name__ == '__main__':
    input_text = sys.argv[1]
    sentiment_result = analyze_sentiment(input_text)
    print(sentiment_result)
